@extends('layouts.app')

@section('content')
<div class="staticContent">
    <span><h2>FAQ</h2></span>
    <div class="wrapper">
        <div class="staticPages">
        {!! $faq[0]->faq !!}
</div>
</div>
</div>
@endsection