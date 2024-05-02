@extends('layouts.app')
@section('content')
<div class="consultingServices">
    <div class="wrapper">
        @if(count($posts) > 0)
        <div class="consultingServicesInner">
            <section class="consultingServicesSet">
                <section>
                    @foreach($posts as $key => $post)
                    <div class="consult-Active" data-id="{{ $post->id }}">
                        <a href="javascript:void(0);">
                            <h4>{{ $post->title }}</h4>
                            <span>
                                <p>{{ $post->user->name }}</p>
                                <p>{{ $post->countrie->country_name }} </p>
                            </span>
                            <ul class="tagsConsult">
                                <li>{{ $post->position[0]->title }}</li>
                                <li>{{ $post->experience[0]->title }}</li>
                                <li>{{ $post->education[0]->title }}</li>
                            </ul>
                            <ul class="consultList">
                                <li><b>Partition:</b> Partition with other team members, such as functional
                                    <b>consultants</b>, provide
                                    technical…
                                </li>
                            </ul>
                            <b>Active 7 days ago</b>
                        </a>
                    </div>
                    @endforeach
                    <div>
                        <a href="" class="allConsultShow">
                            <b>View All</b>
                        </a>
                    </div>
                </section>

                <div class="consultInfo">
                    <div class="headConsult">
                        <section><img id="banner" src="{{ url('storage/',$post->user->banner ) }}" alt="img">
                        </section>
                        <span><img id="logo" src="{{ url('storage/',$post->user->logo ) }}" alt="img"></span>
                    </div>
                    <div class="wrapper">
                        <h4><span id="name">{{ $post->user->name }}</span> <a id="link"
                                href="{{ strpos($post->user->company_website, 'http') === false ? 'http://' . $post->user->company_website : $post->user->company_website }}"><img
                                    src="{{asset('/assets/images/globe.svg')}}" alt="img"> Visit</a></h4>
                        <div class="consultInfoIndeed">You must create an account before continuing to the
                            company website to apply</div>
                        <span>
                            <p id="company_name">{{ $post->user->company_name }}</p>
                            <p id="country_name">{{ $post->countrie->country_name }}</p>
                        </span>
                        <ul class="tagsConsult">
                            <li id="pos">{{ $post->position[0]->title }}</li>
                            <li id="exp">{{ $post->experience[0]->title }}</li>
                            <li id="edu">{{ $post->education[0]->title }}</li>
                        </ul>
                        <ul class="consultList">
                            <li><b>Partition:</b> Partition with other team members, such as functional
                                <b>consultants</b>,
                                provide technical…
                            </li>
                            <li><b>Rebate:</b> Revate with other team members, such as functional
                                <b>consultants</b>
                            </li>
                        </ul>
                        <h6>Full job description</h6>
                        <p><b>ROLE</b></p>
                        <div id="desc">
                            <p>{!! $post->description ? $post->description : $post->profile_summary !!}</p>
                        </div>
                        @if(Auth::check())
                        <div class="buttonsCategory">
                            <section>
                                <button><a href="tel:{{ $post->user->phone }}">Contact US</a></button>
                                <button><a href="mailto:{{ $post->user->email }}">Email</a></button>
                            </section>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
        @else
        <section>
            <div class="noDataFound">
                <img src="{{ asset('assets/images/no-data-found.png') }}" class="img-fluid">
            </div>
        </section>
        @endif
    </div>
</div>
<script>
$(".consult-Active").click(function() {
    $('#desc').html('');
    var id = $(this).data("id");
    $.ajax({
        url: "{{ url('/getpost') }}/" + id,
        type: "GET",
        success: function(data) {
            var banner = "{{ asset('storage/') }}/" + data.user.banner;
            var logo = "{{ asset('storage/') }}/" + data.user.logo;
            $('#banner').attr('src', banner);
            $('#logo').attr('src', logo);
            $('#name').text(data.user.name);
            $('#link').attr('href', 'https://' + data.company_website);
            $('#company_name').text(data.user.company_name);
            $('#country_name').text(data.countrie.country_name);
            $('#pos').text(data.position[0].title);
            $('#exp').text(data.experience[0].title);
            $('#edu').text(data.education[0].title);
            $('#desc').html(data.description ? data.description : data.profile_summary);
        }
    });
});
</script>
@endsection