@extends('backend.layouts.app')
@section('title')
Offer
@endsection
@section('content')

<!-- Hoverable Table rows -->
<div class="contasiner customer-container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-head m-5 customer-card">
                    <a href="{{route('add.offer')}}" class="btn btn-primary" title="Add Category">Add Offer</a>
                    <div class="search">
                        <a class="btn btn-primary pdf" href="{{route('pdf.product')}}">PDF</a>
                        <form action="" method="post" class="search-form">
                            @csrf
                            <input type="search" id="search" name="order_serch" placeholder="Search"
                                class="form-control order-search">
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-header text-center">Offer Table</h3>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Offer Title</th>
                                <th>Offer Percentage</th>
                                <th>Offern Amount</th>
                                <th>Affiliate Link</th>
                                <th>Offer Image</th>
                                <th>Offer Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($offer as $offers)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$offers->category->category_name}}</td>
                                <td>{{$offers->subCategory->sub_category_name}}</td>
                                <td>{{$offers->offer_title}}</td>
                                <td>{{$offers->offer_percentage}}</td>
                                <td>{{$offers->offer_amount}}</td>
                                <td>{{$offers->affiliate_link}}</td>
                                <td>
                                    <img src="{{asset($offers->offer_image)}}" style="width:50; height:50px;"
                                        alt="">
                                </td>
                                <td>{{Str::limit($offers->offer_description,12)}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('edit.offer',$offers->id)}}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="{{route('delete.offer',$offers->id)}}"
                                                onclick="return confirm('Are you sure delete this!')"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Hoverable Table rows -->


@endsection
