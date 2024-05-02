@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span>
        <h2>Payment Successfull</h2>
    </span>
    <div class="wrapper">
        <div class="staticPages">
            <p>Payment Canceled</p>
            <a href="{{ url('/') }}">Back</a>
        </div>
    </div>
</div>
@endsection