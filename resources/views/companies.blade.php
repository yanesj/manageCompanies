@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sideMenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Companies</div>

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


                <form action="{{ route('createCompany') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo">
                        </div>
                        <div class="form-group">
                            <label for="website">Web Site</label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="Web Site">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
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
        <div class="card-header">View Companies</div>
        <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Web Site</th>
                  <th scope="col">Logo</th>
                  <th scope="col">Actions</th>
              </tr>
          </thead>
          <tbody>
            @foreach($companies as $company)
                <tr>
                  <th scope="row">{{$company->name}}</th>
                  <td>{{$company->email}}</td>
                  <td>{{$company->website}}</td>
                  <td>{{$company->logo}}</td>
                  <td>ok</td>
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
