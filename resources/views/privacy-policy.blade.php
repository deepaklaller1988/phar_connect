@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span><h2>Privacy Policy</h2></span>
    <div class="wrapper">
        <div class="staticPages">
{!! $pp[0]->privacy_policies !!}
</div>
</div>
</div>
@endsection