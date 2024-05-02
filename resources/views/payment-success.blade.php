@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span>
        <h2>Payment Successfull</h2>
    </span>
    <div class="wrapper">
        <div class="staticPages">
            <p> Payment successfull for the plan {{ $plan['title']}} having Transaction id {{ $response['id']}}</p>
            <p> For the amount {{ $plan['amount']}}</p>
            <p> Thank you</p>
            <a href="{{ url('/') }}">Back</a>
        </div>
    </div>
</div>
@endsection