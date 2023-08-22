@extends('backend.layouts.app')
@section('title')
Category
@endsection
@section('content')

<!-- Hoverable Table rows -->
<div class="contasiner customer-container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-head m-5 customer-card">
                    <a href="" class="btn btn-primary" title="Add Category" data-bs-toggle="modal"
                        data-bs-target="#categoryModal">Add Category</a>
                    <div class="search">
                        <a href="" class="btn btn-primary pdf">Excel</a>
                        <a class="btn btn-primary pdf" href="{{route('pdf.category')}}">PDF</a>
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
                    <h3 class="card-header text-center">Category Table</h3>
                    <table class="table table-hover table-borderd">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($category as $categories)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$categories->category_name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{route('edit.category',$categories->id)}}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="{{route('delete.category',$categories->id)}}"
                                                onclick="return confirm('Are you sure delete this!')"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $category->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Hoverable Table rows -->

@include('backend.category.categoryAddModal')
@endsection
