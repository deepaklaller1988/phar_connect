@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span><h2>About Us</h2></span>
    <div class="wrapper">
        <div class="staticPages">
{!! $aboutus[0]->about_us !!}
</div>
</div>
</div>
@endsection