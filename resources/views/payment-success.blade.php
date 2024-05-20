@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span>
        <h2>Payment Successfull</h2>
    </span>
    <div class="wrapper">
        <div class="staticPages">
        <div class="paymentSet paymnetSuccess">
        <span><img src="{{asset('/assets/images/1s.png') }}" alt="logo" /></span>
            <p> Payment successfull for the plan {{ $plan['title']}} having Transaction id {{ $response['id']}}</p>
            <p> For the amount $ {{ $plan['amount']}}</p>
            <p> Thank you</p>
            <a href="{{ route('partner.categories') }}">Back</a>
</div>
        </div>
    </div>
</div>
@endsection