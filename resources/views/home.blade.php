@extends('layouts.app')

@section('content')
<div class="midContainer">
<div class="selectMembership">

<section class="plans__container">
  <div class="plans">
    <div class="plansHero">
      <h1 class="plansHero__title">Simple, transparent pricing</h1>
      <p class="plansHero__subtitle">No contracts. No suprise fees.</p>
    </div>
    <div class="planItem__container">
      <!--free plan starts -->
      <div class="planItem planItem--free">

        <div class="card">
          <div class="card__header">
            <div class="card__icon symbol symbol--rounded"></div>
            <h2>Free</h2>
          </div>
          <div class="card__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</div>
        </div>

        <div class="price">$0<span>/ month</span></div>

        <ul class="featureList">
          <li>2 links</li>
          <li>Own analytics platform</li>
          <li class="disabled">Chat support</li>
          <li class="disabled">Mobile application</li>
          <li class="disabled">Unlimited users</li>
        </ul>

        <button class="button">Get Started</button>
      </div>
      <!--free plan ends -->

      <!--pro plan starts -->
      <div class="planItem planItem--pro">
        <div class="card">
          <div class="card__header">
            <div class="card__icon symbol"></div>
            <h2>Pro</h2>
            <div class="card__label label">Best Value</div>
          </div>
          <div class="card__desc">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</div>
        </div>

        <div class="price">$18<span>/ month</span></div>

        <ul class="featureList">
          <li>2 links</li>
          <li>Own analytics platform</li>
          <li>Chat support</li>
          <li class="disabled">Mobile application</li>
          <li class="disabled">Unlimited users</li>
        </ul>

        <button class="button button--pink">Get Started</button>
      </div>
      <!--pro plan ends -->

      <!--entp plan starts -->
      <div class="planItem planItem--entp">
        <div class="card">
          <div class="card__header">
            <div class="card__icon"></div>
            <h2>Enterprise</h2>
          </div>
          <div class="card__desc">Nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor</div>
        </div>

        <div class="price">Let's Talk</div>

        <ul class="featureList">
          <li>2 links</li>
          <li>Own analytics platform</li>
          <li>Chat support</li>
          <li>Mobile application</li>
          <li>Unlimited users</li>
          <li>Customize Panel</li>
        </ul>

        <button class="button button--white">Get Started</button>
      </div>
      <!--entp plan ends -->

    </div>
  </div>
</section>
<!-- partial -->
</div>
  <div class="selectYourCategory">
    <div class="selectSetCategory">
      <div class="selectedCategoryHead">
      <h6>WELCOME KATRINA KAIF</h6>
      <p>Choose a category you want to display on your feed.</p>
      <span>Selcted <b>5</b></span>
</div>
      <ul>
        <li>
          <div class="catgeroyAccordion">
            <input type="checkbox"/>
            <section>
              <span>
                <img src="{{asset('/assets/images/categoriesIcon/1.png') }}" alt="categoriy" />
              </span>
              <h6>Consulting Services</h6>
            </section>
            <div class="allListBelow">
              <ul>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
            </ul>
            </div>
          </div>
        </li>
        <li>
          <div class="catgeroyAccordion">
            <input type="checkbox"/>
            <section>
              <span>
                <img src="{{asset('/assets/images/categoriesIcon/1.png') }}" alt="categoriy" />
              </span>
              <h6>Consulting Services</h6>
            </section>
            <div class="allListBelow">
              <ul>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
            </ul>
            </div>
          </div>
        </li>
        <li>
          <div class="catgeroyAccordion">
            <input type="checkbox"/>
            <section>
              <span>
                <img src="{{asset('/assets/images/categoriesIcon/1.png') }}" alt="categoriy" />
              </span>
              <h6>Consulting Services</h6>
            </section>
            <div class="allListBelow">
              <ul>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
            </ul>
            </div>
          </div>
        </li>
        <li>
          <div class="catgeroyAccordion">
            <input type="checkbox"/>
            <section>
              <span>
                <img src="{{asset('/assets/images/categoriesIcon/1.png') }}" alt="categoriy" />
              </span>
              <h6>Consulting Services</h6>
            </section>
            <div class="allListBelow">
              <ul>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
            </ul>
            </div>
          </div>
        </li>
        <li>
          <div class="catgeroyAccordion">
            <input type="checkbox"/>
            <section>
              <span>
                <img src="{{asset('/assets/images/categoriesIcon/1.png') }}" alt="categoriy" />
              </span>
              <h6>Consulting Services</h6>
            </section>
            <div class="allListBelow">
              <ul>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
                <li><span><input type="checkbox"/><b></b></span> Alert Service</li>
            </ul>
            </div>
          </div>
        </li>
      </ul>
      <div class="submItCategory">
      <button>Submit</button>
</div>
    </div>
  </div>
      <div class="bannerSet">
        <section class="regular slider">
          <div>
            <img src="{{asset('/assets/images/slider/1.jpg')}}" alt="slider">
            <div class="bannerInner">
              <div class="wrapper">
                <section>
                  <div class="textPanel">
                    <h1>YOUR GATEWAY</h1>
                    <p>to Connecting Pharma & Biotech Excellence. You are
                      focused on the big biological question and are poised
                      to dramatically change millions of lives for the better.</p>
                  </div>
                </section>
              </div>
            </div>
          </div>
          <div>
            <img src="{{asset('/assets/images/slider/2.jpg')}}" alt="slider">
            <div class="bannerInner">
              <div class="wrapper">
                <section>
                  <div class="textPanel">
                    <h1>YOUR GATEWAY</h1>
                    <p>to Connecting Pharma & Biotech Excellence. You are
                      focused on the big biological question and are poised
                      to dramatically change millions of lives for the better.</p>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </section>
        <div class="searchOptions">
          <div class="wrapper">
            <form>
              <div class="searchOptionsInner">
                <div class="searchSet">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  <input type="text" placeholder="Search Category Here..." />
                </div>
                <div class="searchSet countrySet">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <input type="text" placeholder="Search Country Here..." />
                </div>
                <button>ENTER</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="pharmCategory categoriesAll">
        <div class="wrapper">
          <div class="headerTitle">
            <h3>CATEGORIES</h3>
            <p>See full sub categories inside</p>
          </div>
          <div class="pharmCategoryInner">
            <section class="center slider">
              @foreach($data['categories'] as $category)
              <div>
                <a href="{{ route('category',$category->id) }}">
                  <span><img src="{{ url('storage/'.$category->image) }}" alt="categoriy" /></span>
                  <h4>{{ $category->title}}</h4>
                  <b>Learn More</b>
                </a>
              </div>
              @endforeach         
            </section>
          </div>
        </div>
      </div>
      <div class="calltoAction">
        <div class="wrapper">
          <div class="callActionInner">
            <div class="callLeft">
              <h3>Share your services, events and
                jobs with a global community . </h3>
              <a href="{{ route('partner.register') }}">BECOME A PARTNER</a>
            </div>
            <div class="callLeft">
              <img src="{{asset('/assets/images/media.png') }}" alt="call to action" />
            </div>
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
              <h4>Partners/Services</h4>
              <section class="center slider">
                @foreach($data['featured_partners'] as $featured_partner)
                @if($featured_partner->logo == '')
                <div>
                <h6>{{ $featured_partner->name }}</h6>
                </div>
                @else
                <div>
                  <img src="{{asset('storage/'.$featured_partner->logo) }}" alt="logo" />
                </div>
                @endif
                @endforeach
              </section>
            </div>
            <div class="innerDifferentSection">
              <h4>Meet the Experts</h4>
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
@endsection

@push('js')
<script>
    function partnerFunction() {
      var element = document.getElementById("partnerOption");
      element.classList.toggle("openPartnerOption");
    }
    $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 150) {
        $("header").addClass("fixHeader");
    } 
    else {
        $("header").removeClass("fixHeader");
    }
});

  </script>

<script type="text/javascript">
    $(document).on('ready', function () {
      $(".regular").slick({
        dots: true,
        prevArrow: false,
        nextArrow: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
      });
      $(".center").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 5000,
      });
    });
  </script>
@endpush