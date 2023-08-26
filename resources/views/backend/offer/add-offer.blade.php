@extends('backend.layouts.app')
@section('title')
Add Offer
@endsection
@section('content')

<!-- Hoverable Table rows -->
<div class="contasiner customer-container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Offer  Create</h3>
                        </div>
                        <div class="search">
                            <a href="{{route('offer')}}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Offer List</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="form_1" action="{{route('save.offer')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('error')
                        <div class="form-group">
                            <label for="category_id"><strong>Category Name</strong></label>
                            <select id="category_id" name="category_id" class="form-control my-2">
                                @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subCategory_id">Sub Category Name</label>
                            <select id="subCategory_id" name="subCategory_id" class="form-control my-2">
                                @foreach($subCategory as $item1)
                                <option value="{{$item1->id}}">{{$item1->sub_category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="merchant_address">Merchant Address</label>
                            <select id="merchant_address" name="merchant_id" class="form-control my-2">
                                @foreach($merchant as $item1)
                                <option value="{{$item1->id}}">{{$item1->address}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="product_name">O Name</label>
                            <input type="text" id="product_name" name="product_name" placeholder="Product Name"
                                class="form-control my-2">
                        </div> --}}
                        <div class="form-group">
                            <label for="offer_title">Offer Title</label>
                            <input type="text" id="offer_title" name="offer_title" placeholder="Offer Title" class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <label for="offer_amount">Offer Amount</label>
                            <input type="text" id="offer_amount" name="offer_amount" class="form-control my-2"  placeholder="Offer Amount">
                        </div>
                        <div class="form-group">
                            <label for="offer_percentage">Offer Percentage</label>
                            <input type="text" id="offer_percentage" name="offer_percentage" class="form-control my-2">

                        </div>
                        <div class="form-group">
                            <label for="offer_description">Offer Description</label>
                            <textarea type="text" id="offer_description" name="offer_description" class="form-control my-2" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="offer_image">Offer Image</label>
                            <input type="file" id="offer_image" name="offer_image" class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <label for="affiliate_link">Affiliate Link</label>
                            <input type="text" id="affiliate_link" name="affiliate_link" class="form-control my-2">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Save Offer" class=" my-2 btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Hoverable Table rows -->


@endsection

