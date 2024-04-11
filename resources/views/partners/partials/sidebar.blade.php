<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="{{ route('partner.dashboard') }}"><img src="{{ asset('assets/admin/logo.png') }}"
                alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/partner/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <div class="nav_title">
                    <span>Dashboard </span>
                </div>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="{{ route('partner.posts') }}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('assets/partner/img/menu-icon/3.svg') }} " alt="">
                </div>
                <div class="nav_title">
                    <span>Posts</span>
                </div>
            </a>
        </li>
        <li>
            @if (Route::has('login'))
            @auth
            <a href="{{ route('logout') }}" class="has-arrow"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="nav_icon_small">
                    <i class="ti-power-off"></i>
                </div>
                <div class="nav_title">
                    <span>Logout </span>
                </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endauth
            @endif
        </li>
    </ul>
</nav>