@extends('layouts.app')
@section('content')


<div class="midContainer">
    <div class="bannerSet bannerSetcategory">
        <div class="wrapper">
            <h4>Welcome to XXX, where expertise meet opportunity.</h4>
            <p>Our goal is to revolutionize how services and industries integral to all aspects of drug development and
                commercialization
                connect and collaborate with Biotechnology and Pharmaceutical companies.</p>
            <p>Our platform facilitates seamless connections, powering a revolution in drug development and
                commercialization by providing
                a single global platform connecting diverse array of service providers and experts.</p>
            <p>Join us as we shape the future of drug development and commercialization, one connection at a time.</p>
        </div>
    </div>
    <div class="pharmCategory categoriesAll catgorySetsAll">
        <div class="wrapper">
            <div class="pharmCategoryInner">
                <section class="categorySet">
                    @foreach($data['categories'] as $category)
                    <div>
                        <a href="{{ route('subcategory',$category->id) }}">
                            <span><img src="{{ url('storage/'.$category->image) }}" alt="categoriy" /></span>
                            <h4>{{ $category->title}}</h4>
                            <b>Learn More</b>
                        </a>
                    </div>
                    @endforeach
                    <div>
                        <a href="" class="allcategoryShow">
                            <b>All Categories</b>
                        </a>
                    </div>
                </section>
            </div>

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
                        <p>Contact:- <a href="">amazon@gmail.com</a></p>
                        <p>Email:- <a href="">9898-767-989</a></p>
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
            <div class="consultingServices">
                <div class="wrapper">
                    <div class="consultingServicesInner">
                        <section class="consultingServicesSet">
                            <section>
                                <div class="consult-Active">
                                    <a href="">
                                        <h4>Central Technical Consultant</h4>
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
                                                <b>consultants</b>, provide
                                                technical…
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>

                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>

                                <div>
                                    <a href="">
                                        <h4>Technical Consultant</h4>
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
                                                <b>consultants</b>, provide
                                                technical…
                                            </li>
                                            <li><b>Rebate:</b> Best with other team members, such as functional
                                                <b>consultants</b>,
                                                provide
                                                technical…</li>

                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>

                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                                <b>consultants</b>, provide
                                                technical…
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                                <b>consultants</b>, provide
                                                technical…
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <h4>Dynamics 365 Business Central Technical Consultant</h4>
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
                                            <li><b>Rebate:</b> Rebate with other team members, such as functional
                                                <b>consultants</b>, project
                                                managers, and end-users, to gather requirements.
                                            </li>
                                        </ul>
                                        <b>Active 7 days ago</b>
                                    </a>
                                </div>
                                <div>
                                    <a href="" class="allConsultShow">
                                        <b>View All</b>
                                    </a>
                                </div>
                            </section>

                            <div class="consultInfo">
                                <div class="headConsult">
                                    <section><img src="{{asset('/assets/images/consultBanner.jpg')}}" alt="img">
                                    </section>
                                    <span><img src="{{asset('/assets/images/logoconsult.jpg')}}" alt="img"></span>
                                </div>
                                <div class="wrapper">
                                    <h4>Central Technical Consultant</h4>
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
                </div>
            </div>

            <div class="pharmCategory pharmPartnersLogo">
                <div class="wrapper">
                    <div class="headerTitle">
                        <h3>FEATURED</h3>
                        <p>Explore features of pharma</p>
                    </div>
                    <div class="pharmCategoryInner">
                        <div class="innerDifferentSection">
                            <h4>Upcoming Events</h4>
                            <section class="center slider">
                                <div>
                                    <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                                </div>
                                <div>
                                    <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                                </div>
                                <div>
                                    <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                                </div>
                                <div>
                                    <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                                </div>
                                <div>
                                    <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                                </div>
                                <div>
                                    <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                                </div>
                                <div>
                                    <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                                </div>
                                <div>
                                    <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                                </div>
                                <div>
                                    <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="pharmCategory pharmPartnersLogo">
                        <div class="wrapper">
                            <div class="headerTitle">
                                <h3>FEATURED</h3>
                                <p>Explore features of pharma</p>
                            </div>
                            <div class="pharmCategoryInner">
                                <div class="innerDifferentSection">
                                    <h4>Upcoming Events</h4>
                                    <section class="center slider">
                                        <div>
                                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                                        </div>
                                        <div>
                                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                                        </div>
                                        <div>
                                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                                        </div>
                                        <div>
                                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                                        </div>
                                        <div>
                                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                                        </div>
                                        <div>
                                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                                        </div>
                                        <div>
                                            <img src="{{asset('/assets/images/logos/1.png') }}" alt="logo" />
                                        </div>
                                        <div>
                                            <img src="{{asset('/assets/images/logos/2.png') }}" alt="logo" />
                                        </div>
                                        <div>
                                            <img src="{{asset('/assets/images/logos/3.png') }}" alt="logo" />
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection