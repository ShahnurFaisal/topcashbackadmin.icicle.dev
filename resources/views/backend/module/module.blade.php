@extends('backend.layouts.app')
@section('title')
    Module
@endsection
@section('content')

    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <a href="{{route('add.module')}}" class="btn btn-primary" title="Add Role" >Add Module</a>
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
                        <h3 class="card-header text-center">Module Table</h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($module as $modules)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$modules->module_name}}</td>
                                    <td>
                                        <a href="{{route('edit.module',$modules->id)}}" title="Edit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{route('delete.module',$modules->id)}}" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure delete this!')"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $module->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



