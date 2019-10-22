@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sideMenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Employees</div>

                <div class="card-body">
                   @if(session()->has('alert-success')) 
                    <div class="alert alert-success">
                      <strong>Success!</strong> {{ session()->get('alert-success') }} 
                  </div>

                  @endif 

                  
                  <ul >
                    @foreach ($errors->all() as $error)
                    <li style="color:#F00;">{{ $error }}</li>
                    @endforeach
                </ul>


                <form action="{{ route('updateEmployee', $employeeEdit->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="First Name" value="{{$employeeEdit->first_name}}">
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                 <select id="company_id" name="company_id" class="form-control">
                                    <option  value="">Choose...</option>
                                    @foreach($companies as $companie)  
                                       
                                        <option @if($companie->id==$employeeEdit->company->id){{'selected'}} @endif value="{{$companie->id}}">{{$companie->name}}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{$employeeEdit->last_name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" value="{{$employeeEdit->email}}">
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{$employeeEdit->phone}}">
                        </div>
                    </div>



                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary">Update</button>

                </div>

            </form>
        </div>

    </div>
</div>
</div>
</div>
@endsection
