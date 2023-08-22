@extends('backend.layouts.app')
@section('title')
Commission
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('commission.calculate')}}" method="POST">
                        @csrf
                        <label for="balance">Commission</label>
                        <input type="text" id="balance" name="balance"  placeholder="Enter your Commission" class="form-control">
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <select name="user_id" id="name" class="form-control">
                                @foreach($user as $value)
                                    <option value="{{  $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name1">Merchant Name</label>
                            <select name="admin_id" id="name1" class="form-control">
                                @foreach($admin as $value)
                                    <option value="{{  $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Your form fields here -->
                        <button type="submit">Calculate Commission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
