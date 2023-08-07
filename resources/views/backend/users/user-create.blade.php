@extends('backend.layouts.app')
@section('title')
    User Create
@endsection
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="card-head m-5 ">
                  <div class="text-center">
                      <h2>Create New User</h2>
                  </div>
              </div>
          </div>
      </div>
      @include('error')


      {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control my-2')) !!}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Email:</strong>
                  {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control my-2')) !!}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Password:</strong>
                  {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control my-2')) !!}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Confirm Password:</strong>
                  {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control my-2')) !!}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Role:</strong>
                  {!! Form::select('roles[]', $roles,[], array('class' => 'form-control my-2','multiple')) !!}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
      {!! Form::close() !!}
  </div>
@endsection
