@extends('backend.layouts.app')
@section('title')
    Merchant
@endsection
@section('content')
    <style>
        @media only print {
            body {
                visibility: hidden;
            }
            .table {
                visibility: visible;
            }
        }

    </style>
    <!-- Hoverable Table rows -->
    <div class="contasiner customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-head  m-5">
                        <div class="mb-4 text-center">
                            <h1 class="">Merchant Table</h1>
                            <hr>
                        </div>
                       <div class="customer-card">
                           <a href="{{route('add.merchant')}}" class="btn btn-primary">Merchant Create</a>
                           <div class="search">
                               <a href="{{route('csv.customer')}}" class="btn btn-primary pdf">CSV</a>
                               <a href="{{route('excel.customer')}}" class="btn btn-primary pdf">Excel</a>
                               <a class="btn btn-primary pdf" href="{{route('pdf.customer')}}">PDF</a>
                               <a class="btn btn-primary pdf btnprn" href="" onclick="print()">Print</a>
                               <form action="" method="post" class="search-form">
                                   @csrf
                                   <input type="search" id="search" name="order_serch" placeholder="Search"
                                          class="form-control order-search">
                               </form>
                           </div>
                       </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-borderd">
                            <thead>
                            <tr>
                                <th>SI</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Company Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            @php $i = 1 @endphp
                            @foreach($merchant as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->merchant_name}} </td>
                                    <td>{{$item->merchant_number}}</td>
                                    <td>{{$item->merchant_email}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->company_name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('edit.merchant',$item->id)}}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="{{route('delete.merchant',$item->id)}}"
                                                   onclick="return confirm('Are you sure delete this!')"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $merchant->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Hoverable Table rows -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {


        });
        function cssPrint() {

            print();
        }
    </script>
@endsection
