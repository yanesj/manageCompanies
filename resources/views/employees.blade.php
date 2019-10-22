@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sideMenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Employees</div>

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
                <form action="{{ route('createEmployee') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select id="company_id" name="company_id" class="form-control">
                                    <option selected value="">Choose...</option>
                                    @foreach($companies as $companie)  
                                    <option value="{{$companie->id}}">{{$companie->name}}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                        </div>
                    </div>



                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary">Send</button>

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
        <div class="card-header">View Employees</div>
        <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                  <th scope="row"><a href="{{url('editEmployee')}}/{{$employee->id}}">{{$employee->first_name}}
                  </a></th>
                  <td>{{$employee->last_name}}</td>
                  <td>{{$employee->company->name}}</td>
                  <td>{{$employee->email}}</td>
                  <td>{{$employee->phone}}</td>
                  <td><form action="{{ route('deleteEmployee', $employee->id) }}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                   <button type="submit" class="btn btn-primary">Delete</button>
                  </form></td>


                </form>


            </td>
        </tr>
        @endforeach

    </tbody>
</table>
 {{ $employees->links() }}

</div>
</div> 
</div>
</div>

</div>
@endsection
