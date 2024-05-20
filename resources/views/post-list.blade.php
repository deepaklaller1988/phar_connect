@extends('layouts.app')
@section('content')
<div class="consultingServices">
    <div class="staticContent">
        <span>
            <h2>{{ isset($category->title) ? $category->title : ''}}</h2>
            <p>{{ isset($getcat->title) ? $getcat->title : ''}}</p>
        </span>
    </div>
    <div class="wrapper">
        <div class="consultingServicesInner padding-top-50">
            @if(count($posts) > 0)
            <section class="consultingServicesSet postAll">
                <section>
                    @foreach($posts as $post)
                    <div class="csearchedSet">
                        <a href="{{ route('post-details', $post->slug) }}">
                            <section>
                                <div class="searchImage">
                                    @if($post->user->logo)
                                    <img src="{{asset('storage/'.$post->user->logo) }}" alt="logo" />
                                    @else
                                    <b>{{ strtoupper(substr($post->user->company_name, 0, 2 )) }}</b>
                                    @endif
                                </div>
                                <div class="serachPost">
                                    <h4>{{ $post->title }}</h4>
                                    <span>
                                        <p>{{ $post->user->name }}</p>
                                        <p>{{ $post->user->location }}</p>
                                    </span>
                                    @if($post->key_services)
                                    <ul class="tagsConsult">
                                        @foreach(explode(',',$post->key_services) as $key_service)
                                        <li>{{ $key_service }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </section>
                            <ul class="consultList">
                                @php
                                if($post->description){
                                $htmlContent = "$post->description";
                                }else{
                                $htmlContent = "$post->profile_summary";
                                }

                                $truncatedContent = Illuminate\Support\Str::limit(strip_tags($htmlContent), 200);
                                $isTruncated = strlen(strip_tags($htmlContent)) > strlen($truncatedContent);
                                @endphp
                                {!! $truncatedContent !!}

                                <b>Read More</b>
                            </ul>
                            <!-- <b>Active for
                                {{ date_diff(new \DateTime($post->time), new \DateTime())->format(" %d days"); }}</b> -->

                        </a>
                    </div>
                    @endforeach
                </section>

            </section>
            @else
            <section>
                <div class="noDataFound">
                    <img src="{{ asset('assets/images/no-data-found.png') }}" class="img-fluid">
                </div>
            </section>
            @endif
        </div>
    </div>
</div>
@endsection