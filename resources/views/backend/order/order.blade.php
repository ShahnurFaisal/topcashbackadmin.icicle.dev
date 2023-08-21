@extends('backend.layouts.app')
@section('title')
Order
@endsection
@section('content')

<!-- Hoverable Table rows -->
<div class="contasiner customer-container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head customer-card m-5">
                    <h1 class="">Order Table</h1>
                    <div class="search">
                    <a class="btn btn-primary pdf" href="{{route('pdf.order')}}">PDF</a>
                    <form action="" method="post" class="search-form">
                        @csrf
                        <input type="search" id="search" name="order_serch" placeholder="Search"
                            class="form-control order-search">
                    </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Customer Name</th>
                                <th>Offer Title</th>
                                <th>Quantity</th>
                                <th>Order Date</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $i = 1 @endphp
                            @foreach($order as $orders)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$orders->user->name}}</td>
                                <td>{{$orders->offer_id}}</td>
                                <td>{{$orders->quantity}}</td>
                                <td>{{$orders->order_date}}</td>
                                <td>{{$orders->total_price}}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route('edit.order',$orders->id)}}"><i class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="{{route('delete.order',$orders->id)}}"
                                                onclick="return confirm('Are you sure delete this!')"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $order->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Hoverable Table rows -->
@endsection
