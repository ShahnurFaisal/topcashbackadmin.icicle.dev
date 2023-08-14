<!-- qr_code_generator.blade.php -->

@extends('backend.layouts.app') <!-- If you have a master layout, extend it -->

@section('content')
    <div>
        <!-- Display any previous QR codes generated by the user -->


        <!-- QR code generator form -->

        <table class="table">
            <tr>
                <th>Send QR Code</th>
            </tr>
            <tr>
                <td>
                    <form action="{{ route('generate_qr_code.post') }}" method="POST">
                    @csrf
                    <!-- Add any necessary form inputs here -->
                    @foreach($user as $item)
                        <!-- Example: If you want the user to input a name -->
                            <input type="hidden" name="name" id="name" value="{{$item->name}}">
                            <input type="hidden" name="email" id="email" value="{{$item->email}}">

                            <button class="btn btn-success" type="submit">Approve</button>
                        @endforeach
                    </form>
                </td>
            </tr>
        </table>
    </div>
@endsection
