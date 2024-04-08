<header class="">
      <div class="wrapper">
        <div class="headerHub">
          <a href="{{ url('/') }}"><img src="{{asset('/assets/images/logo.jpg') }}" alt="logo" /></a>
          <div class="headerNav">
            <nav>
              <span>
              <a href=""><i class="fa fa-bars" aria-hidden="true"></i>
                All categories</a>
                <div class="hubAllLinksMenu">
              <ul class="linksCategories">
              @foreach($allcategories['maincategories'] as $key => $mcategory)
                <li><a href="{{ route('category',$mcategory->id) }}">{{ $mcategory->title }} </a>
                  <ul class="linksSubcategories activeLinkSet">
                    @foreach($allcategories[$key]['childcategories'] as $childcat)
                    <li><a href="">{{ $childcat->title }}</a>
                      <div class="sub-linksCategories">
<ul>
  <li><a href=""><span><img src="{{asset('/assets/images/logo.jpg') }}" alt="sub category"/></span><b>Drug Substance</b></a></li>
  <li><a href=""><span><img src="{{asset('/assets/images/logo.jpg') }}" alt="sub category"/></span><b>Drug Substance</b></a></li>
  <li><a href=""><span><img src="{{asset('/assets/images/logo.jpg') }}" alt="sub category"/></span><b>Drug Substance</b></a></li>
  <li><a href=""><span><img src="{{asset('/assets/images/logo.jpg') }}" alt="sub category"/></span><b>Drug Substance</b></a></li>
  <li><a href=""><span><img src="{{asset('/assets/images/logo.jpg') }}" alt="sub category"/></span><b>Drug Substance</b></a></li>
  <li><a href=""><span><img src="{{asset('/assets/images/logo.jpg') }}" alt="sub category"/></span><b>Drug Substance</b></a></li>
  <li><a href=""><span><img src="{{asset('/assets/images/logo.jpg') }}" alt="sub category"/></span><b>Drug Substance</b></a></li>
</ul>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </li>
              @endforeach
              </ul>
            </div>
              </span>
              <a href="">About us</a>
              <a href="">Contact us</a>
              @if (Route::has('login'))
              @auth
              @if(auth()->user()->type == "partner")
              <a href="{{ url('/partner/dashboard') }}">Dashboard</a>
              @else
              <a href="{{ url('/') }}">Dashboard</a>
              @endif
              @else
              <a href="{{ route('login') }}">Sign in</a>
              @endauth
              @endif
            </nav>
            @if (Route::has('login'))
            @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
            @else
            <div class="dropOption">
              <button onclick="partnerFunction()">CREATE AN ACCOUNT</button>
              <ul id="partnerOption">
                
                @if (Route::has('register'))
                <li><a href="{{ route('partner.register') }}">Become a Partner</a></li>
                <li><a href="{{ route('register') }}">Become a Member</a></li>
                @endif
              </ul>
            </div>
            @endauth
            @endif
          </div>
        </div>
      </div>
    </header>
