@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sideMenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! trans('messages.create_companies') !!}</div>

                <div class="card-body">
                    @if(session()->has('alert-success')) 
                    <div class="alert alert-success">
                      <strong>{!! trans('messages.success') !!}</strong> {{ session()->get('alert-success') }} 
                  </div>

                  @endif 

                  
                  <ul >
                    @foreach ($errors->all() as $error)
                    <li style="color:#F00;">{{ $error }}</li>
                    @endforeach
                </ul>


                <form action="{{ route('createCompany') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{!! trans('messages.name') !!}</label>
                                <input type="text" class="form-control"  name="name" id="name" placeholder="{!! trans('messages.name') !!}">
                            </div>
                            <div class="form-group">
                                <label for="email">{!! trans('messages.email') !!}</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="{!! trans('messages.email') !!}">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="logo">{!! trans('messages.logo') !!}</label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="{!! trans('messages.logo') !!}">
                        </div>
                        <div class="form-group">
                            <label for="website">{!! trans('messages.website') !!}</label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="{!! trans('messages.website') !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">{!! trans('messages.send') !!}</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>

    </div>
</div>
</div>
<br/>
<div class="row">
    <div class="col-md-12">
       <div class="card">
        <div class="card-header">{!! trans('messages.view_companies') !!}</div>
        <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">{!! trans('messages.name') !!}</th>
                  <th scope="col">{!! trans('messages.email') !!}</th>
                  <th scope="col">{!! trans('messages.website') !!}</th>
                  <th scope="col">{!! trans('messages.logo') !!}</th>
                  <th scope="col">{!! trans('messages.actions') !!}</th>
              </tr>
          </thead>
          <tbody>
            @foreach($companies as $company)
                <tr>
                  <th scope="row"><a href="{{url('editCompany')}}/{{$company->id}}">{{$company->name}}
                  </a></th>
                  <td>{{$company->email}}</td>
                  <td>{{$company->website}}</td>
                  <td><a href="{{ asset('storage/'.$company->logo) }}" target="_blank">{!! trans('messages.view') !!}</a></td>
                  <td><form action="{{ route('deleteCompany', $company->id) }}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                   <button type="submit" class="btn btn-primary">{!! trans('messages.delete') !!}</button>
                  </form>
                </td>
                </tr>
            @endforeach

      </tbody>
  </table>
  {{ $companies->links() }}
</div>
</div> 

</div>
</div>           

</div>
@endsection
