@extends('backend.layouts.app')
@section('title')
Update Order
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 text-center"><span class="text-muted fw-light"></span> Order Layout</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-body">
                        @include('error')

                        <form action="{{route('update.order')}}" method="post">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Customer Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" value="{{$order->user->name}}" name="customer_name"
                                 placeholder="John Doe" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="product_name">Offer Title</label>
                                <input type="text" class="form-control" id="product_name" value="{{$order->offer}}" name="product_name"
                                 placeholder="Product name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="quantity">Quantity</label>
                                <input type="text" class="form-control" id="quantity" value="{{$order->quantity}}" name="quantity"
                                 placeholder="Quantity" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="order_date">Order Date</label>
                                <input type="date" id="order_date" class="form-control"  value="{{$order->order_date}}" name="order_date">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="total_price">Total Price</label>
                                <input type="text" class="form-control" id="total_price" name="total_price" value="{{$order->total_price}}"
                                 placeholder="Total Price" />
                            </div>
                            <button type="submit" class="btn btn-primary">Order Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
