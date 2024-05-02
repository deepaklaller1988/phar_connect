@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span>
        <h2>Payment Successfull</h2>
    </span>
    <div class="wrapper">
        <div class="staticPages">
        <div class="paymentSet paymnetCancel">
        <span><img src="{{asset('/assets/images/2c.png') }}" alt="logo" /></span>
            <p>Payment Canceled</p>
            <a href="{{ url('/') }}">Back</a>
</div>
        </div>
    </div>
</div>
@endsection