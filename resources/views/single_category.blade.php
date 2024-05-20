@extends('layouts.app')

@section('content')
<style>
.mt-3 {
    margin-top: 20px
}
</style>
<div class="singlePageDetail">
    <div class="wrapper">
        <div class="singlePageDetailHub">
            <div class="leftSideSlider">

                <div class="sideCategoryInfo">
                    <h6>{{ $post->title }}</h6>
                    <div class="partnerName">
                        <a
                            href="{{ route('partner-details', strtolower(str_replace(' ','-', $post->user->name))) }}">{{ $post->user->name }}</a>
                    </div>
                    <p><b>{{ $post->post_views ? $post->post_views : 0}}</b> Views | <span><img
                                src="{{asset('/assets/images/verify.png') }}" alt="categoriy" />
                            Verified | 12 Years</span> | <span>{{ $post->country_name }}</span></p>
                </div>
                @if($post->images)
                <div class="categorySliding">
                    <div class="videos-slider-2">
                        @foreach(explode(',',$post->images) as $image)
                        <div>
                            <img src="{{ asset('storage/'.$image) }}" alt="" />
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-nav-thumbnails">
                        @foreach(explode(',',$post->images) as $image)
                        <div>
                            <img src="{{ asset('storage/'.$image) }}" alt="" />
                        </div>
                        @endforeach

                    </div>
                </div>
                @endif
            </div>
            <div class="rightCategoryInfo">
                <h6>{{ $post->title }}</h6>
                @if(isset($post->event_name))
                <p>Event : <b>{{ $post->event_name }}</b></p>
                @endif
                @if(isset($post->start_date) && isset($post->end_date))
                <p>Event Date : <b>{{ $post->start_date }} - {{ $post->end_date }}</b></p>
                @endif
                <p class="mt-3">{!! $post->description ? $post->description : $post->profile_summary !!}</p>
                @if (Auth::check())
                <div class="buttonsCategory">
                    <section>
                        <button><a href="tel:{{ $post->user->phone }}">Contact US</a></button>
                        <button><a href="mailto:{{ $post->user->email }}">Email</a></button>
                    </section>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection