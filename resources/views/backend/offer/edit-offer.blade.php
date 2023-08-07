@extends('backend.layouts.app')
@section('title')
Update Offer
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
                    <form action="{{route('update.offer')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('error')
                        <input type="hidden" name="offer_id" value="{{ $Offer->id }}">
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
                            <label for="offer_title">Offer Title</label>
                            <input type="text" id="offer_title" value="{{ $Offer->offer_title }}" name="offer_title" placeholder="Offer Title" class="form-control my-2">
                        </div>
                        <div class="form-group">
                            <label for="offer_amount">Offer Amount</label>
                            <input type="text" id="offer_amount" value="{{ $Offer->offer_amount }}" name="offer_amount" class="form-control my-2"  placeholder="Offer Amount">
                        </div>
                        <div class="form-group">
                            <label for="offer_percentage">Offer Percentage</label>
                            <input type="text" id="offer_percentage"  value="{{ $Offer->offer_percentage }}" name="offer_percentage" class="form-control my-2">

                        </div>
                        <div class="form-group">
                            <label for="offer_description">Offer Description</label>
                            <textarea type="text" id="offer_description" name="offer_description" class="form-control my-2" >{{ $Offer->offer_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="offer_image">Offer Image</label>
                            <input type="file" id="offer_image" name="offer_image" class="form-control my-2">
                            <img id="offer_photo" src="{{ asset($Offer->offer_image) }}" alt="" class="image-style mb-3">
                        </div>
                        <div class="form-group">
                            <label for="affiliate_link">Affiliate Link</label>
                            <input type="text" id="affiliate_link" value="{{ $Offer->affiliate_link }}" name="affiliate_link" class="form-control my-2">
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
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('#offer_image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#offer_photo').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
