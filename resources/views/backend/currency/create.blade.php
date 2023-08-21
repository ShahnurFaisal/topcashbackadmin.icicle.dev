@extends('backend.layouts.app')
@section('title')
    Add Module
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Admin Create</h3>
                        </div>
                        <div class="search">
                            <a href="{{ route('adminList') }}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Admin List</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form action="{{ route('adminCreate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><strong>Name</strong></label>
                                    <input type="text" id="name" name="name" placeholder="Admin Name" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="name"><strong>Email</strong></label>
                                    <input type="text" id="email" name="email" placeholder="Admin Email" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="mobile"><strong>Mobile</strong></label>
                                    <input type="text" id="mobile" name="mobile" placeholder="Admin Mobile Number" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="name"><strong>Password</strong></label>
                                    <input type="password" id="password" name="password" placeholder="Admin Password" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="image"><strong>Image</strong></label>
                                    <input type="file" id="image" name="image" class="form-control my-2">
                                </div>
                                <label for="roles">Choose a Role:</label>
                                <select id="roles" name="user_role" class="form-control">
                                    <option value="admin">Super Admin</option>
                                    <option value="manager">Merchant</option>
                                    <option value="employee">Customer</option>
                                </select>
                                <input type="submit" value="Submit" class="btn btn-primary my-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







