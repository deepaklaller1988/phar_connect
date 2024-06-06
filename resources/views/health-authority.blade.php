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
            <section class="healthLinksRedirect">
                <div class="width100Set" id="tab">
                    <ul>
                        @foreach($posts as  $child)
                        <li><a href="{{ $child['company_website'] }}" target="_blank"><span><img src="{{asset('/assets/images/link.png') }}" alt="link" /></span> {{ $child['title'] }}</a></li>
                        @endforeach
                        <ul>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection