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
                            <h3>Currency Create</h3>
                        </div>
                        <div class="search">
                            <a href="{{ route('currency.index') }}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Currency List</a>
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
                                    <label for="name"><strong>Currency Name</strong></label>
                                    <input type="text" id="name" name="name" placeholder="Enter Currency Name" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="symbol"><strong>Symbol</strong></label>
                                    <input type="text" id="symbol" name="symbol" placeholder="Enter Your Currency Symbol" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="code"><strong>Code</strong></label>
                                    <input type="text" id="code" name="code" placeholder="Enter your code" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="exchange_rate"><strong>Exchange Rate</strong></label>
                                    <input type="password" id="exchange_rate" name="exchange_rate" placeholder="Enter Exchange Rate" class="form-control my-2">
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







