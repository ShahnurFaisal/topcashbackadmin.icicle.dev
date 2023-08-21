@extends('backend.layouts.app')
@section('title')
    Admin List
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Admin List</h3>
                        </div>
                        <div class="search">
                            <a href="{{ route('create-admin') }}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Create Admin</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-header text-center"></h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- @php $i = 1 @endphp
                            @foreach($module as $modules) --}}
                            @foreach($list as $key => $lists)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lists->name }}</td>
                                <td>{{ $lists->mobile }}</td>
                                <td>
                                    <img height="50" width="50" src="{{ asset('images/'.$lists->image) }}" alt="">
                                    {{-- <img height="50" width="50" src="{{ asset('images/'.$user->image) }}" alt=""> --}}
                                </td>
                                <td>
                                    <a href="{{ route('showEditAdmin',$lists->id) }}" title="Edit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ route('deleteAdmin',$lists->id) }}" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure delete this!')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







