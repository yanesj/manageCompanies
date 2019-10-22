<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
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
        $companies = Company::orderBy('name','asc')->get();
        $employees = Employee::with('company')->orderBy('first_name','asc')->paginate(10);
        return view('employees',['companies'=>$companies,
                                 'employees'=>$employees
                     ]);

    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
          'first_name'=>'required',
          'last_name'=>'required',
          'company_id'=>'required',

      ]);
        
        if($validator->fails()){
            return redirect('/employees')->withInput()
            ->withErrors($validator);
        }

        $company = Company::findOrFail($request->company_id);
        $company->employee()->create(['first_name' => $request->first_name,
            'last_name' => $request->last_name, 
            'email' => $request->email,
            'phone' => $request->phone 
        ]);
        return redirect('/employees')->with('alert-success', 'Success!');

    }

     public function edit(Request $request, $id){
        $selected='';
        $employee = Employee::findOrFail($id);
        $companies = Company::orderBy('name','asc')->get();
        return view('employeeEdit',['employeeEdit'=>$employee,
                                    'companies'=>$companies
                    ]);
    }

    public function update(Request $request,$id){
         $validator = Validator::make($request->all(),[
          'first_name'=>'required',
          'last_name'=>'required',
          'company_id'=>'required',

      ]);

      $employee = Employee::findOrFail($id);
      $employee->first_name = $request->first_name;
      $employee->last_name = $request->last_name;
      $employee->email= $request->email;
      $employee->phone = $request->phone;
      $employee->company_id = $request->company_id;
      $employee->save();
      return redirect('/editEmployee/'.$id)->with('alert-success', 'Employee Sucessfully Updated!');
    }

        public function delete(Request $request,$id){
        Employee::findorFail($id)->delete();
        return redirect('/employees')->with('alert-success', 'Employee Suceesfully Deleted!');
    }
}
