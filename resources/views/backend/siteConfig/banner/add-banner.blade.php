@extends('backend.layouts.app')
@section('title')
    Add Banner
@endsection
@section('content')

    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Banner Create</h3>
                        </div>
                        <div class="search">
                            <a href="{{route('banner')}}" class="btn btn-primary" title="Add Category" >
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Banner List</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form action="{{route('store.banner')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="position"><strong>Position</strong></label>
                                    <input type="text" id="position" name="banner_position" placeholder="Position will be here..(1,2,3)" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="image"><strong>Image</strong></label>
                                    <input type="file" class="form-control my-2" name="banner_image" id="image"/>
                                    <img id="showImage" src="{{asset('admin')}}/assets/img/avatars/noImage.jpg" alt="" class="image-style mb-3">
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
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush




