@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sideMenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Companies</div>

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


                <form action="{{ route('updateCompany', $companyEdit->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Name" value="{{$companyEdit->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" value="{{$companyEdit->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo" value="{{$companyEdit->logo}}">
                        </div>
                        <div class="form-group">
                            <label for="website">Web Site</label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="Web Site" value="{{$companyEdit->website}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>

    </div>
</div>
</div>
</div>
@endsection
