@extends('backend.layouts.app')
@section('title')
    edit Module
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Module Update</h3>
                        </div>
                        <div class="search">
                            <a href="{{route('module')}}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Module List</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form action="{{route('update.module')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="module_id" value="{{$module->id}}">
                                <div class="form-group">
                                    <label for="module_name"><strong>Module Name</strong></label>
                                    <input type="text" id="module_name" name="module_name" value="{{$module->module_name}}"  placeholder="Module Name" class="form-control my-2">
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








