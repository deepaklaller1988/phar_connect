<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label"></div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu active pcoded-trigger">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="{{ route('admin.categories') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-sliders"></i>
                        </span>
                        <span class="pcoded-mtext">Categories</span>
                    </a>
                </li>
                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-users"></i>
                        </span>
                        <span class="pcoded-mtext">Users</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="{{ route('admin.partners') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Partners</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('admin.members') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Members</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="{{ route('admin.plans') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Plans</span>
                    </a>
                </li>
                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Pages</span>
                    </a>
                    <ul class="pcoded-submenu" style="display: none;">
                        <li class="">
                            <a href="{{ route('admin.pages.about-us') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">About Us</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.pages.faq') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">FAQ</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.pages.terms-and-conditions') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Terms & Conditions</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.pages.privacy-policies') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Privacy Policy</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="{{ route('admin.posts') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-server"></i>
                        </span>
                        <span class="pcoded-mtext">Posts</span>
                    </a>
                </li>
                <li class=" ">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-log-out"></i>
                        </span>
                        <span class="pcoded-mtext">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endauth
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>