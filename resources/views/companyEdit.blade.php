@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sideMenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! trans('messages.edit_companies') !!}</div>

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
                                <label for="name">{!! trans('messages.name') !!}</label>
                                <input type="text" class="form-control"  name="name" id="name" placeholder="{!! trans('messages.name') !!}" value="{{$companyEdit->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">{!! trans('messages.email') !!}</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="{!! trans('messages.email') !!}" value="{{$companyEdit->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="logo">{!! trans('messages.logo') !!}</label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="{!! trans('messages.logo') !!}" value="{{$companyEdit->logo}}">
                        </div>
                        <div class="form-group">
                            <label for="website">{!! trans('messages.website') !!}</label>
                            <input type="text" class="form-control" name="website" id="website" placeholder="{!! trans('messages.website') !!}" value="{{$companyEdit->website}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">{!! trans('messages.update') !!}</button>
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
