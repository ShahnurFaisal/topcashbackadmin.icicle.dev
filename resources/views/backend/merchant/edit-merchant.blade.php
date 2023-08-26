@extends('backend.layouts.app')
@section('title')
    Update Merchant
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Merchant Update</h3>
                        </div>
                        <div class="search">
                            <a href="{{route('merchant')}}" class="btn btn-primary" title="Add Category" >
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Merchant List</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form action="{{route('update.merchant')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="merchant_id" value="{{$merchant->id}}">
                                <div class="form-group">
                                    <label for="name"><strong>Merchant Name</strong></label>
                                    <input type="text" id="name" name="merchant_name" value="{{$merchant->merchant_name}}"  placeholder="Enter Merchant Name" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="number"><strong>Merchant Number</strong></label>
                                    <input type="text" id="number"  value="{{$merchant->merchant_number}}" name="merchant_number" placeholder="Enter Merchant Number" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Merchant Email</strong></label>
                                    <input type="email" id="email"  value="{{$merchant->merchant_email}}" name="merchant_email" placeholder="Enter Merchant Email" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="address"><strong>Merchant Address</strong></label>
                                    <input type="text" id="address" value="{{$merchant->address}}" name="address"  placeholder="Enter Merchant Address" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="password"><strong>Merchant Password</strong></label>
                                    <input type="password" id="password" name="merchant_password"  placeholder="Enter Merchant Password" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="company_name"><strong>Company Name</strong></label>
                                    <input type="text" id="company_name" value="{{$merchant->company_name}}" name="company_name"  placeholder="Enter Merchant Address" class="form-control my-2">

                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
