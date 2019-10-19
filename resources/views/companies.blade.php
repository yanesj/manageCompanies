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
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
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
</div>
@endsection
