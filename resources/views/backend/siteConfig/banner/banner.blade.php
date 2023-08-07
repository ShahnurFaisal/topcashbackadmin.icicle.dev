@extends('backend.layouts.app')
@section('title')
    Banner
@endsection
@section('content')

    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <a href="{{route('add.banner')}}" class="btn btn-primary" title="Add Category">Add Banner</a>
                        <div class="search">
                            <a class="btn btn-primary pdf" href="{{route('pdf.subCategory')}}">PDF</a>
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
                        <h3 class="card-header text-center">Banner Table</h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Position</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($banner as $banners)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$banners->banner_position}}</td>
                                    <td>
                                        <img src="{{asset($banners->banner_image)}}" class="slideImg" alt="">
                                    </td>
                                    <td>
                                        <a href="{{route('edit.banner',$banners->id)}}" class="btn btn-primary" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{route('delete.banner',$banners->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure Delete This!')"title="Edit"><i class="fa-solid fa-trash"></i></a>
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


@endsection


