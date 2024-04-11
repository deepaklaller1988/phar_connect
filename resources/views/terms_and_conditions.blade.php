@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span><h2>Terms & Condition</h2></span>
    <div class="wrapper">
        <div class="staticPages">
{!! $tnc[0]->terms_and_conditions !!}
</div>
</div>
</div>
@endsection