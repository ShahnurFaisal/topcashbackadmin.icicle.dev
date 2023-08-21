@extends('backend.layouts.app')
@section('title')
    Sub Module
@endsection
@section('content')

    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <a href="{{route('add.subModule')}}" class="btn btn-primary" title="Add Role" >Add Sub Module</a>
                        <div class="search">
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
                        <h3 class="card-header text-center">Sub Module Table</h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Module Name</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($subModule as $subModules)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$subModules->module->module_name}}</td>
                                    <td>{{$subModules->subModule_name}}</td>
                                    <td>
                                        <a href="{{route('edit.subModule',$subModules->id)}}" title="Edit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{route('delete.subModule',$subModules->id)}}" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure delete this!')"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $subModule->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




