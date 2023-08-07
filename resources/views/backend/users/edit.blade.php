@extends('backend.layouts.app')
@section('title')
    User Edit
@endsection
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-lg-12 margin-tb">
             <div class="card-head m-5 ">
                 <div class="text-center">
                     <h2>Edit New User</h2>
                 </div>
             </div>
         </div>
     </div>
     @include('error')
     {!! Form::model($user,['method'=>'PATCH','route'=>['users.update','$user->id']]) !!}
     <div class="row">
         <div class="col-lg-12">
             <div class="form-group">
                 <strong>Name: </strong>
                 {!! Form::text('name','null',array('placeholder'=>'Name','class'=>'form-control')) !!}
             </div>
         </div>
         <div class="col-lg-12">
             <div class="form-group">
                 <strong>Email: </strong>
                 {!! Form::text('email','null',array('placeholder'=>'Email','class'=>'form-control')) !!}
             </div>
         </div>
         <div class="col-lg-12">
             <div class="form-group">
                 <strong>Password: </strong>
                 {!! Form::password('password','null',array('placeholder'=>'Password','class'=>'form-control')) !!}
             </div>
         </div>
         <div class="col-lg-12">
             <div class="form-group">
                 <strong>Confirm Password: </strong>
                 {!! Form::password('confirm-password','null',array('placeholder'=>'Confirm Password','class'=>'form-control')) !!}
             </div>
         </div>
         <div class="col-lg-12">
             <div class="form-group">
                 <strong>Role: </strong>
                 {!! Form::select('roles[]',$roles,$userRole,array('class'=>'form-control','multiple')) !!}
             </div>
         </div>
         <div class="col-lg-12">
             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>
         </div>
         {!! Form::class() !!}
     </div>
 </div>
@endsection
