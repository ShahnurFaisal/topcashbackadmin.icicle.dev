@extends('backend.layouts.app')
@section('title')
    User Show
@endsection
@section('content')
    <div class="contsainer">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card-head m-5 ">
                <div class="text-center">
                    <h2>Create Show User</h2>
                </div>
            </div>
        </div>
    </div>
    @include('error')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
