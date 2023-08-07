@extends('backend.layouts.app')
@section('title')
Edit Inventory
@endsection
@section('content')

<!-- Hoverable Table rows -->
<div class="contasiner customer-container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-head m-5 ">
                    <h1 class="text-center">Update Inventory Page</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('update.inventory')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('error')
                        <input type="hidden" name="id" value="{{ $inventory->id }}">
                        <div class="form-group">
                            <label for="product_name">Offer Title</label>
                            <select id="product_name" name="offer_id" class="form-control my-2">
                                @foreach($offer as $item)
                                <option value="{{$item->id}}">{{$item->offer_title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Offer Percentage</label>
                            <select id="product_price" name="inventory_offer_percentage" class="form-control my-2">
                                @foreach($offer as $item)
                                <option value="{{$item->id}}">{{$item->offer_percentage}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" id="quantity" value="{{ $inventory->quantity }}" name="quantity" placeholder="Quantity"
                                class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <label for="total_price">Total Price</label>
                            <input type="text" value="{{ $inventory->total_price }}" id="total_price" name="total_price" placeholder="total Price"
                                class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save Product" class=" my-2 btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Hoverable Table rows -->


@endsection
