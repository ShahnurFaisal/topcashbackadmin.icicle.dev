@extends('backend.layouts.app')
@section('title')
    Inventory
@endsection
@section('content')

    <!-- Hoverable Table rows -->
    <div class="contasiner customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <a href="{{route('add.inventory')}}" class="btn btn-primary" title="Add Category">Add Inventory</a>
                        <a class="btn btn-primary" href="{{route('pdf.inventory')}}">PDF</a>

                        <form action="" method="post">
                            @csrf
                            <input type="search" id="search" name="product_serch" placeholder="Search"
                                   class="form-control customer-search">
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-header text-center">Inventory Table</h3>
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Offer Title</th>
                                <th>Offer Price</th>
                                <td>Quantity</td>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($inventory as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->offer_id}}</td>
                                    <td>{{ $item->offer_id }}</td>
                                    <td>{{ $item->quantity}}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>
                                        <a href="{{ route('edit.inventory', $item->id) }}" class="btn btn-primary" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('delete.inventory',$item->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure Delete This!')"title="Edit"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $inventory->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Hoverable Table rows -->


@endsection
