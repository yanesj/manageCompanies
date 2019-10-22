<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DealWithFile;

use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $companies = Company::paginate(10);
        return view('companies',['companies'=>$companies]);
    }

    

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
          'name'=>'required'

      ]);
        
        if($validator->fails()){
            return redirect('/companies')->withInput()
            ->withErrors($validator);
        }

        $file = $request->file('logo');
        $image = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        $nombre = DealWithFile::rename();

        \Storage::disk('public')->put($nombre.'.'.$fileExtension,  \File::get($file));

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $nombre.'.'.$fileExtension;
        $company->website = $request->website;
        $company->save();

        
        return redirect('/companies')->with('alert-success', 'Success!');

    }

    public function edit(Request $request, $id){
        $company = Company::findOrFail($id);
        return view('companyEdit',['companyEdit'=>$company]);
    }

    public function update(Request $request, $id){
        $company = Company::findOrFail($id);

         $validator = Validator::make($request->all(),[
          'name'=>'required'

      ]);
        
        if($validator->fails()){
            return redirect('/editCompany/'.$id)->withInput()
            ->withErrors($validator);
        }

        $file = $request->file('logo');
        $image = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        $nombre = DealWithFile::rename();

        \Storage::disk('public')->put($nombre.'.'.$fileExtension,  \File::get($file));

        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $nombre.'.'.$fileExtension;
        $company->website = $request->website;
        $company->save();
        return redirect('/editCompany/'.$id)->with('alert-success', 'Comany Sucessfully Updated!');
    }

    public function delete(Request $request,$id){
        Company::findorFail($id)->delete();
        return redirect('/companies')->with('alert-success', 'Company Suceesfully Deleted!');
    }

}
