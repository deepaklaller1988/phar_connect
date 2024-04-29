@extends('layouts.app')
@section('content')
<div class="consultInfo partnerPageMain">
    <div class="headConsult">
        <section><img src="{{ asset('storage/'.$partner->banner) }}" alt="img"></section>
        <div class="wrapper">
            <span><img src="{{asset('storage/'.$partner->logo) }}" alt="img"></span>
        </div>
    </div>
    <div class="wrapper">
        <div class="leftRightPartnerSet">
            <section>
                <h4>{{ $partner->name }}</h4>
                <span>
                    <p>{{ $partner->company_name }}</p>
                    <p>{{ $partner->country->country_name }}</p>
                </span>
                <div class="consultInfoIndeed">Website:- <a href="{{ $partner->company_website }}"
                        target="_blank">{{ $partner->company_website }}</a></div>
            </section>
            <section>
                @if($partner->key_services)
                <ul class="tagsConsult">
                    <b>Key Services:-</b>
                    @php
                    $services = explode(',', $partner->key_services);
                    @endphp
                    @foreach ($services as $service)
                    <li>{{ $service }}</li>
                    @endforeach
                </ul>
                @endif
                <ul class="tagsConsult">
                    <b>Year of Establishment:-</b>
                    <li>{{ date('Y') }}</li>
                </ul>
                @if($partner->certifications)
                <ul class="tagsConsult certifyMe">
                    <b>Certifications:-</b>
                    @php
                    $certifications = explode(',', $partner->certifications);
                    @endphp
                    @foreach ($certifications as $certification)
                    <li>{{ $certification }}</li>
                    @endforeach
                </ul>
                @endif
            </section>
        </div>
        <!-- <ul class="consultList">
                            <li><b>Description:</b> Best in class to make keys with <b>Sensor too...</b></li>
                            <li><b>Class A:</b> Making sensor sets as per your need.</li>
                        </ul> -->
        @if(Auth::check())
        <div class="partnerCallEmail">
            <p>Email:- <a href="mailto:{{ $partner->email }}">{{ $partner->email }}</a></p>
            <p>Contact:- <a href="tel:{{ $partner->phone }}">{{ $partner->phone }}</a></p>
        </div>
        @endif
        <h6>Full Company description</h6>
        <p>{!! $partner->company_profile !!}</p>
        <div class="categoryTabs">
            <div class="wrapper">
                <div class="categoryTabsInner">
                    @foreach($allcategories['maincategories'] as $key => $mcategory)
                    <a href="{{ url('category', $mcategory->slug) }}" class="activeCategory">{{ $mcategory->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection