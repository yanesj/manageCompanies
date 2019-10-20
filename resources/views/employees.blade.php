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
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
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
                                        <option selected>Choose...</option>
                                        <option>...</option>
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
                                <input type="text" class="form-control" name="email" id="email" placeholder="Web Site">
                            </div>
                        </div>



                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Web Site">
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
            <div class="vertical-menu">
              <a href="{{route('companies')}}">Companies</a>
              <a href="{{route('employees')}}">Employees</a>

          </div>
      </div>
  </div> 
</div>
</div>

</div>
@endsection
