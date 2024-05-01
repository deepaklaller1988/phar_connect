@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span>
        <h2>Payment Successfull</h2>
    </span>
    <div class="wrapper">
        <div class="staticPages">
            <p> Payment successfull for the plan {{ $response['L_DESC0']}} having order id {{ $response['DESC']}}</p>
            <p> For the amount {{ $response['AMT']}}</p>
            <p> Thank you</p>
            <a href="{{ url('/') }}">Back</a>
        </div>
    </div>
</div>
@endsection