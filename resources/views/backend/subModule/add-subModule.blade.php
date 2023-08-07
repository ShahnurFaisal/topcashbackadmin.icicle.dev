@extends('backend.layouts.app')
@section('title')
    Add SubModule
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Sub Module Create</h3>
                        </div>
                        <div class="search">
                            <a href="{{route('subModule')}}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Sub Module List</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form action="{{route('store.subModule')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="module_id"><strong>Module Name</strong></label>
                                    <select name="module_id" id="module_id" class="form-control my-2">
                                        <option value="">---Select Module---</option>
                                        @foreach($module as $modules)
                                            <option value="{{$modules->id}}">{{$modules->module_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subModule_name"><strong>Sub Module Name</strong></label>
                                    <input type="text" id="subModule_name" name="subModule_name" placeholder="Sub Module Name" class="form-control my-2">
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









