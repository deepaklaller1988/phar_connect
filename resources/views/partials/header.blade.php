<header class="">
    <div class="wrapper">
        <div class="headerHub">
            <a href="{{ url('/') }}"><img src="{{asset('/assets/images/logo.jpg') }}" alt="logo" /></a>
            <div class="headerNav">
                <nav>
                    <span>
                        <a href="" id="main-category"><i class="fa fa-bars" aria-hidden="true"></i>
                            All categories</a>
                        <div class="hubAllLinksMenu">
                            <ul class="linksCategories">
                                @foreach($allcategories['maincategories'] as $key => $mcategory)
                                <li><a href="{{ route('category',$mcategory->slug) }}">{{ $mcategory->title }} </a>
                                    <ul class="linksSubcategories activeLinkSet" id="child-cat">
                                        @foreach($allcategories[$key]['childcategories'] as $skey => $childcat)
                                        <li><a
                                                href="{{ route('subcategory',$childcat->slug) }}">{{ $childcat->title }}</a>
                                            <div class="sub-linksCategories" id="sub-cat">
                                                <ul>
                                                    @foreach($allcategories[$key][$skey]['subcategories'] as $childcat)
                                                    <li><a href="{{ route('subcategory',$childcat->slug) }}"><span><img
                                                                    src="{{ url('storage/'.$childcat->image) }}"
                                                                    alt="sub category" /></span><b>{{ $childcat->title }}</b></a>
                                                    </li>
                                                    @endforeach
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
                    <a href="{{ route('about-us') }}">About us</a>
                    <a href="{{ route('contact-us') }}">Contact us</a>
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}">Sign in</a>
                    @endif
                </nav>
                @if (Route::has('login'))
                @auth
                <div class="dropOption">
                    <button onclick="partnerFunction()">Dashboard</button>
                    <ul id="partnerOption">
                        @if(auth()->user()->type == "partner")
                        <li><a href="{{ route('partner.dashboard') }}">Dashboard</a></li>
                        @else
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @endif
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>

                @else
                <div class="dropOption">
                    <button onclick="partnerFunction()">CREATE AN ACCOUNT</button>
                    <ul id="partnerOption">

                        @if (Route::has('register'))
                        <li><a href="{{ route('partner.register') }}">Become a Partner</a></li>
                        <li><a href="{{ route('register') }}">Become a Member</a><span>You will see only posts for now!
                                After register you can apply.</span></li>
                        @endif
                    </ul>
                </div>
                @endauth
                @endif
            </div>
        </div>
    </div>
</header>
<script>
$("#main-category").hover(function() {
    $('#child-cat').css('z-index', 2);
    $('#sub-cat').css('z-index', 2);
});
</script>