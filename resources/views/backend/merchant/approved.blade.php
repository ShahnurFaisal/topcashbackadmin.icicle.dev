@extends('backend.layouts.app')

@section('content')
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

                       <div class="customer-card">
                        <h1 class="">Approval Table</h1>
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th><strong>Offer Title</strong></th>
                                <th><strong>Offer QR Code</strong></th>
                                {{-- <th>Approved Date</th> --}}
                                <th><strong>Action</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offer as $offers)
                               <tr>
                                   <td>{{$offers->offer_title}}</td>
                                   @foreach ( $qrCode as $qrCodes)
                                   <td>
                                    {!! DNS2D::getBarCodeHTML("$qrCodes->qr_code_data",'QRCODE',3, 3) !!}
                                    P- {{ $qrCodes->qr_code_data }}
                                </td>

                                   @endforeach

                                   {{-- <td>{{\carbon\carbon::create($offers->approved_date)->format('d-M-y')}}</td> --}}
                                   <td><a class="btn btn-success" href="{{ route('approveOffer',[$offers->id,'approved']) }}">Approved</a></td>
                                   {{-- <td><a class="btn btn-danger" href="{{ route('approvePhoto',[$offers->id,'declined']) }}">Denied</a></td> --}}
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


<div class="col-12">


    {{-- {{$photos->links()}} --}}
</div>
