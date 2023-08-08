@extends('backend.layouts.app')
@section('title')
    Add Merchant
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Merchant Create</h3>
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
                            <form action="{{route('save.merchant')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><strong>Merchant Name</strong></label>
                                    <input type="text" id="name" name="merchant_name"  placeholder="Enter Merchant Name" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="number"><strong>Merchant Number</strong></label>
                                    <input type="text" id="number" name="merchant_number" placeholder="Enter Merchant Number" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Merchant Email</strong></label>
                                    <input type="email" id="email" name="merchant_email"  placeholder="Enter Merchant Email" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="password"><strong>Merchant Password</strong></label>
                                    <input type="password" id="password" name="merchant_password"  placeholder="Enter Merchant Password" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="company_name"><strong>Company Name</strong></label>
                                    <select name="offer_id" id="company_name" class="form-control my-2">
                                        <option value="">Choose Company Name</option>
                                        @foreach($offer as $item)
                                            <option value="{{$item->id}}">{{$item->offer_title}}</option>
                                        @endforeach
                                    </select>
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

