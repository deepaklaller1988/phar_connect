@extends('layouts.app')

@section('content')
</div><div class="healthAthaurity">
    <div class="globalHeaderSet">
        <div class="wrapper">
            <h2>Global Regulatory Authority</h2>
        </div>
    </div>
    <div class="wrapper">
        <div class="fullHealthDetails">
            <section class="healthAreas">
                <ul>
                    @foreach($data as $dt)
                    <li><a href="#tab{{ $dt['id'] }}">{{ $dt['name'] }}</a></li>
                    @endforeach
                </ul>
            </section>
            <section class="healthLinksRedirect">
                @foreach($data as $key => $dt)
                <div class="width100Set" id="tab{{ $dt['id'] }}">
                    <h6>{{ $dt['name'] }}</h6>
                    <ul>
                        @foreach($dt['posts'] as $skey =>  $child)
                        <li><a href="{{ $child['company_website'] }}" target="_blank">{{ $child['title'] }}</a></li>
                        @endforeach
                        <ul>
                </div>
                @endforeach
            </section>
        </div>
    </div>
</div>

@endsection