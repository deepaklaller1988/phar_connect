@extends('layouts.app')

@section('content')
<div class="singlePageDetail">
    <div class="wrapper">
        <div class="singlePageDetailHub">
            <div class="leftSideSlider">

                <div class="sideCategoryInfo">
                    <h6>{{ $post->title }}</h6>
                    <div class="partnerName">
                        <a href="{{ route('partner-details', strtolower(str_replace(' ','-', $post->user->name))) }}">{{ $post->user->name }}</a>
                    </div>
                    <p><b>{{ $post->post_views ? $post->post_views : 0}}</b> Views | <span><img src="{{asset('/assets/images/verify.png') }}" alt="categoriy" />
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
                <p>{!! $post->description ? $post->description : $post->profile_summary !!}</p>
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