@extends('layouts.app')
@section('content')
<div class="consultingServices">
    <div class="wrapper">
        <div class="consultingServicesInner">
            @if(count($posts) > 0)
            <section class="consultingServicesSet postAll">
                <section>
                    @foreach($posts as $post)
                    <div class="consult-Active">
                        <a href="{{ route('post-details',['id'=>$post->id]) }}">
                            <h4>{{ $post->title }}</h4>
                            <span>
                                <p>{{ $post->user->name }}</p>
                                <p>{{ $post->user->location }}</p>
                            </span>
                            <ul class="tagsConsult">
                                @foreach(explode(',',$post->key_services) as $key_service)
                                <li>{{ $key_service }}</li>
                                @endforeach
                            </ul>
                            <ul class="consultList">
                                @php
                                $htmlContent = "$post->description";
                                $truncatedContent = Illuminate\Support\Str::limit(strip_tags($htmlContent), 200);
                                $isTruncated = strlen(strip_tags($htmlContent)) > strlen($truncatedContent);
                                @endphp
                                {!! $truncatedContent !!}


                            </ul>
                            <b>Active for
                                {{ date_diff(new \DateTime($post->time), new \DateTime())->format(" %d days"); }}</b>

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