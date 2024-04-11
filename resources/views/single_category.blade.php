@extends('layouts.app')

@section('content')
<div class="singlePageDetail">
    <div class="wrapper">
        <div class="singlePageDetailHub">
            <div class="leftSideSlider">

                <div class="sideCategoryInfo">
                    <h6>{{ $post->title }}</h6>
                    <div class="partnerName">
                        <a href="{{ route('partner-details', $post->user->id) }}">{{ $post->user->name }}</a>
                    </div>
                    <p><b>23</b> Views | <span><img src="{{asset('/assets/images/verify.png') }}" alt="categoriy" />
                            Verified | 12 Years</span> | <span>{{ $post->user->location }}</span></p>
                </div>
                <div class="categorySliding">
                    <div class="videos-slider-2">
                        @foreach(explode(',',$post->images) as $image)
                        <div>
                            <img src="{{ asset('storage/uploads/posts/'.$image) }}" alt="" />
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-nav-thumbnails">
                        @foreach(explode(',',$post->images) as $image)
                        <div>
                            <img src="{{ asset('storage/uploads/posts/'.$image) }}" alt="" />
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="rightCategoryInfo">
                <p>Info Ends in <b>{{ date_diff(new \DateTime($post->time), new \DateTime())->format(" %d days"); }}</b></p>
                <h6>{{ $post->title }}</h6>
                <p>{!! $post->description !!}</p>
                <div class="buttonsCategory">
                    <section><button>Contact US</button><button>Email</button></section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection