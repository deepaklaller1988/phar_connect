@extends('layouts.app')
@section('content')
<div class="consultingServices">
    <div class="wrapper">
        @if(count($posts) > 0)
        <div class="consultingServicesInner">
            <section class="consultingServicesSet">
                <section>
                    @foreach($posts as $post)
                    <div class="consult-Active">
                        <a href="">
                            <h4>{{ $post->title }}</h4>
                            <span>
                                <p>{{ $post->user->name }}</p>
                                <p>{{ $post->countrie->country_name }} </p>
                            </span>
                            <ul class="tagsConsult">
                                <li>₹5,00,000 - ₹15,00,000 a year</li>
                                <li>Full Time</li>
                                <li>Night Shift</li>
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
                        <section><img src="{{ url('storage/',$post->user->banner ) }}" alt="img">
                        </section>
                        <span><img src="{{ url('storage/',$post->user->logo ) }}" alt="img"></span>
                    </div>
                    <div class="wrapper">
                        <h4>Central Technical Consultant <a href=""><img src="{{asset('/assets/images/globe.svg')}}"
                                    alt="img"> Visit</a></h4>
                        <div class="consultInfoIndeed">You must create an account before continuing to the
                            company website to apply</div>
                        <span>
                            <p>Robosol Systems Private Limited</p>
                            <p>Mulund West, Mumbai, Maharashtra</p>
                        </span>
                        <ul class="tagsConsult">
                            <li>₹5,00,000 - ₹15,00,000 a year</li>
                            <li>Full Time</li>
                            <li>Night Shift</li>
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
                        <p>Level: Senior Consultant</p>
                        <p>As a Senior Consultant at Deloitte Consulting, you will be responsible for
                            designing,
                            developing
                            pipelines and planning the deployment of the code to various environments as
                            part of
                            large-scale
                            software solutions at enterprise level. You will work with functional and
                            technical teams on
                            the
                            project located across shores independently leading and mentoring junior team
                            members,
                            collaborating
                            to understand the functional requirements and translate them into work products.
                            You will be
                            involved
                            in end-to-end delivery of the project from estimations, planning, execution and
                            tracking
                            metrics for
                            analysis.</p>
                        <p>Lead a team to manage application enhancements, break-fixes, standard
                            applications changes
                            and
                            maintenance activities.</p>
                        <b>Active 7 days ago</b>
                        <div class="buttonsCategory">
                            <section><button>Contact US</button><button>Email</button></section>
                        </div>
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
$(window).bind('beforeunload', function() {
    window.loaction = '/';
});
</script>
@endsection