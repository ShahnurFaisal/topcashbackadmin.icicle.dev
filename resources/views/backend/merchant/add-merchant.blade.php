@extends('backend.layouts.app')
@section('title')
    Add Merchant
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head m-5 customer-card">
                        <div class="left">
                            <h3>Merchant Create</h3>
                        </div>
                        <div class="search">
                            <a href="{{route('merchant')}}" class="btn btn-primary" title="Add Category" >
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Merchant List</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-8">
                            <form class="form_1" action="{{route('save.merchant')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><strong>Merchant Name</strong></label>
                                    <input type="text" id="name" name="merchant_name"  placeholder="Enter Merchant Name" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="number"><strong>Merchant Number</strong></label>
                                    <input type="text" id="number" name="merchant_number" placeholder="Enter Merchant Number" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Merchant Email</strong></label>
                                    <input type="email" id="email" name="merchant_email"  placeholder="Enter Merchant Email" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="address"><strong>Merchant Address</strong></label>
                                    <input type="text" id="address" name="address"  placeholder="Enter Merchant Address" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="password"><strong>Merchant Password</strong></label>
                                    <input type="password" id="password" name="merchant_password"  placeholder="Enter Merchant Password" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="company_name"><strong>Company Name</strong></label>
                                    <input type="text" id="company_name" name="company_name"  placeholder="Enter Merchant Address" class="form-control my-2">

                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="Latitude" name="latitude" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="Longitude" name="longitude" class="form-control my-2">
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY&libraries=places"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("address");
        form.addEventListener("submit", function (event) {
            event.preventDefault();

            const address = document.getElementById("address").value;

            const geocoder = new google.maps.Geocoder();

            geocoder.geocode({ address: address }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    const latitude = results[0].geometry.location.lat();
                    const longitude = results[0].geometry.location.lng();

                    console.log("Latitude: " + latitude);
                    console.log("Longitude: " + longitude);
                } else {
                    console.log("Geocode was not successful for the following reason: " + status);
                }
            });
        });
    });
</script>




<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        document.querySelector('.form_1 input[name="latitude"]').value = position.coords.latitude;
        document.querySelector('.form_1 input[name="longitude"]').value = position.coords.longitude;
    }
</script>


@endpush

