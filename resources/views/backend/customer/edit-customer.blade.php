@extends('backend.layouts.app')
@section('title')
Update Customer
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 text-center"><span class="text-muted fw-light"></span> Customer Layout</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        @include('error')
                        
                        <form action="{{route('update.customer')}}" method="post">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{$users->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="name"
                                value="{{$users->name}}" placeholder="John Doe" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">phone</label>
                                <input type="text" class="form-control" id="basic-default-company" name="phone"
                                value="{{$users->phone}}" placeholder="test@gamil.com" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Email</label>
                                <input type="email" class="form-control" id="basic-default-company" name="email"
                                value="{{$users->email}}" placeholder="test@gamil.com" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Address</label>
                                <textarea id="basic-default-message" class="form-control" name="address"
                                    placeholder="Enter your Address">{{$users->address}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Payment Information</label>
                                <input type="text" class="form-control" id="basic-default-company" name="payment_information" 
                                value="{{$users->payment_information}}" placeholder="Payment Information" />
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection