@extends('backend.layouts.app')
@section('title')
    Edit Role
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Role Update</h3>
                        </div>
                        <div class="search">
                            <a href="{{route('role')}}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Role List</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form action="{{route('update.role')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role_id" value="{{$role->id}}">
                                <div class="form-group">
                                    <label for="role_name"><strong>Role Name</strong></label>
                                    <input type="text" id="role_name" name="role_name" value="{{$role->role_name}}" placeholder="Role Name" class="form-control my-2">
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary my-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







