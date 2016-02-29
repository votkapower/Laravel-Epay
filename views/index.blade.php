@extends('epay::master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/epaywrapper/review" method="POST" class="form-horizontal" style="padding-top: 30px;">
                    <div class="form-group">
                        <label for="" class="form-label col-md-4">Invoice Num.</label>
                        <div class="col-md-6">
                            <input type="text" name="INVOICE" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label col-md-4">Total Amount</label>
                        <div class="col-md-6">
                            <input type="number" name="AMOUNT" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label col-md-4">Expiration Date</label>
                        <div class="col-md-6">
                            <input type="date" name="EXP_TIME" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label col-md-4">Description</label>
                        <div class="col-md-6">
                            <input type="text" name="DESCR" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection