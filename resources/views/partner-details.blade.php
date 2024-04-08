@extends('layouts.app')
@section('content')
<div class="consultInfo partnerPageMain">
    <div class="headConsult">
        <section><img src="{{asset('/assets/images/consultBanner.jpg')}}" alt="img"></section>
        <div class="wrapper">
            <span><img src="{{asset('/assets/images/logoconsult.jpg')}}" alt="img"></span>
        </div>
    </div>
    <div class="wrapper">
        <div class="leftRightPartnerSet">
            <section>
                <h4>Central Technical Consultant</h4>
                <span>
                    <p>Robosol Systems Private Limited</p>
                    <p>Mulund West, Mumbai, Maharashtra</p>
                </span>
                <div class="consultInfoIndeed">Website:- <a href="">www.amazon.com</a></div>
            </section>
            <section>
                <ul class="tagsConsult">
                    <b>Key Services:-</b>
                    <li>Duplicate Key Maker</li>
                    <li>Door Key</li>
                    <li>Car Key</li>
                    <li>Sensor Key</li>
                </ul>
                <ul class="tagsConsult">
                    <b>Year of Establishment:-</b>
                    <li>2023</li>
                </ul>
                <ul class="tagsConsult certifyMe">
                    <b>Certifications:-</b>
                    <li><a href="">Alliance.pdf</a></li>
                </ul>
            </section>
        </div>
        <!-- <ul class="consultList">
                            <li><b>Description:</b> Best in class to make keys with <b>Sensor too...</b></li>
                            <li><b>Class A:</b> Making sensor sets as per your need.</li>
                        </ul> -->
        <div class="partnerCallEmail">
            <p>Email:- <a href="">amazon@gmail.com</a></p>
            <p>Contact:- <a href="">9898-767-989</a></p>
        </div>
        <h6>Full Company description</h6>
        <p>Level: Senior Consultant</p>
        <p>As a Senior Consultant at Deloitte Consulting, you will be responsible for designing,
            developing
            pipelines and planning the deployment of the code to various environments as part of
            large-scale
            software solutions at enterprise level. You will work with functional and technical teams on
            the
            project located across shores independently leading and mentoring junior team members,
            collaborating
            to understand the functional requirements and translate them into work products. You will be
            involved
            in end-to-end delivery of the project from estimations, planning, execution and tracking
            metrics for
            analysis.</p>
        <p>Lead a team to manage application enhancements, break-fixes, standard applications changes
            and
            maintenance activities.</p>
        <div class="categoryTabs">
            <div class="wrapper">
                <div class="categoryTabsInner">
                    <a href="" class="activeCategory">Business Offerings</a>
                    <a href="">Consulting Services</a>
                    <a href="">Events/Conferences</a>
                    <a href="">Health Authority Sites</a>
                    <a href="">Jobs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection