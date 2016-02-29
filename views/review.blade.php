@extends('epay::master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{$urlSubmit}}" method="POST" class="form-horizontal">
                    @include('epay::order-details')
                    <!-- Input fields containing the encoded and hashed data, callback urls -->
                    <input type=hidden name=PAGE value="{{$page}}">
                    <input type=hidden name=ENCODED value="{{$encodedData}}">
                    <input type=hidden name=CHECKSUM value="{{$hashedData}}">
                    <input type=hidden name=URL_OK value="{{$urlCompleted}}">
                    <input type=hidden name=URL_CANCEL value="{{$urlCanceled}}">

                    <input type="submit" value="Send to ePay" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection