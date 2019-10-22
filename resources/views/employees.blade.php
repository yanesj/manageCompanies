@extends('layouts.app')

@section('content')



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.sideMenu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{!! trans('messages.create_employees') !!}</div>

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
                <form action="{{ route('createEmployee') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">{!! trans('messages.first_name') !!}</label>
                                <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="{!! trans('messages.first_name') !!}">
                            </div>
                            <div class="form-group">
                                <label for="company_id">{!! trans('messages.company') !!}</label>
                                <select id="company_id" name="company_id" class="form-control">
                                    <option selected value="">{!! trans('messages.choose_option') !!}</option>
                                    @foreach($companies as $companie)  
                                    <option value="{{$companie->id}}">{{$companie->name}}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="last_name">{!! trans('messages.second_name') !!}</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="{!! trans('messages.second_name') !!}">
                        </div>
                        <div class="form-group">
                            <label for="email">{!! trans('messages.email') !!}</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="{!! trans('messages.email') !!}">
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">{!! trans('messages.phone') !!}</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="{!! trans('messages.phone') !!}">
                        </div>
                    </div>



                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary">{!! trans('messages.send') !!}</button>

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
        <div class="card-header">{!! trans('messages.view_employees') !!}</div>
        <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th scope="col">{!! trans('messages.first_name') !!}</th>
                    <th scope="col">{!! trans('messages.second_name') !!}</th>
                    <th scope="col">{!! trans('messages.company') !!}</th>
                    <th scope="col">{!! trans('messages.email') !!}</th>
                    <th scope="col">{!! trans('messages.phone') !!}</th>
                    <th scope="col">{!! trans('messages.actions') !!}</th>

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
                   <button type="submit" class="btn btn-primary">{!! trans('messages.delete') !!}</button>
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
