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
                                <th><strong>User</strong></th>
                                <th><strong>Offer QR Code</strong></th>
                                <th><strong>QR_Code Created_at</strong></th>
                                <th><strong>QR_Code expire_date</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($qrCode as $offers)
                               <tr>
                                   <td>{{ $offers->admins->name }}</td>

                                   <td>
                                    {!! DNS2D::getBarCodeHTML("$offers->qr_code_data",'QRCODE',3, 3) !!}
                                    P- {{ $offers->qr_code_data }}
                                </td>
                                <td>{{\carbon\carbon::create($offers->created_at)->format('d-M-y')}}</td>
                                <td>{{ $offers->expiry_date }}</td>

{{--                                <td>--}}
{{--                                    {{ $offers->status }}--}}
{{--                                </td>--}}
                                   {{-- <td>
                                    <a id="approveButton" class="btn btn-success {{ $offers->status == 'approved' ? 'approved' : '' }}"
                                        href="{{ route('approveOffer', [$offers->id, 'approved']) }}">
                                         {{ $offers->status == 'approved' ? 'Approved' : 'Approve' }}
                                     </a>

                                </td>
                                   <td>
                                    <a class="btn btn-danger" href="{{ route('approveOffer',[$offers->id,'declined']) }}">{{ $offers->status == 'declined' ? 'Declined' : 'Decline' }}</a>
                                </td> --}}
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
            <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#approveButton').click(function() {
            // Update button text to "Approved"
            $(this).text('Approved');
            // Add the 'approved' class to change its appearance
            $(this).addClass('approved');
        });
    });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {


        });
        function cssPrint() {

            print();
        }
    </script>
@endsection
