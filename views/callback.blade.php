@extends('epay::master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('epay::order-details')
                <div class="alert alert-{{$message['type']}}">
                    {{$message['content']}}
                </div>
            </div>
        </div>
    </div>
@endsection