@extends('backend.layouts.app')
@section('title')
    Currency List
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Currency List</h3>
                        </div>
                        <div class="search">
                            <a href="{{ route('currency.create') }}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Add Currency</a>
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
                                <th>Symbol</th>
                                <th>Code</th>
                                <th>Exchange Rate</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($currency as $key => $lists)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lists->name }}</td>
                                <td>{{ $lists->symbol }}</td>
                                <td>{{ $lists->code }}</td>
                                <td>{{ $lists->exchange_rate }}</td>
                                <td>{{ $lists->status }}</td>
                                <td>
                                    <a href="{{ route('showEditAdmin',$lists->id) }}" title="Edit" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ route('deleteAdmin',$lists->id) }}" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure delete this!')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







