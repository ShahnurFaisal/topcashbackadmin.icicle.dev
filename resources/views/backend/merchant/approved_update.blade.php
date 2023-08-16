@extends('backend.layouts.app')
@section('title')
Customer
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
                <div class="card-head customer-card m-5">
                    <h1 class="">Customer Table</h1>
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
                <div class="card-body">
                    <table class="table table-hover table-borderd">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $i = 1 @endphp
                            @foreach($user as $item)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->name}}
                                </td>
                                <td>{{$item->phone}}
                                </td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->address}}</td>
                                <td>
                                    <form action="{{ route('generate_qr_code.post') }}" method="POST">
                                    @csrf
                                    <!-- Add any necessary form inputs here -->
                                    <!-- Example: If you want the user to input a name -->
                                    <input type="hidden" name="name" id="name" value="{{$item->name}}">
                                    <input type="hidden" name="email" id="email" value="{{$item->email}}">

                                    <button class="btn btn-success" type="submit">Approve</button>

                                </form>
                                </td>
                                <td>
                                    <form action="{{ route('generate_qr_code.post') }}" method="POST">
                                        @csrf
                                        <!-- Add any necessary form inputs here -->

                                        <!-- Example: If you want the user to input a name -->
                                        <input type="hidden" name="name" id="name" value="{{$item->name}}">
                                        <input type="hidden" name="email" id="email" value="{{$item->email}}">

                                        <button class="btn btn-danger" type="submit">Decline</button>



                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
