<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label"></div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu active pcoded-trigger">
                    <a href="{{ route('partner.dashboard') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->status == 1)
                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="{{ route('partner.posts') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-sliders"></i>
                        </span>
                        <span class="pcoded-mtext">Posts</span>
                    </a> 
                </li>
                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="{{ route('partner.notifications') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-bell"></i>
                        </span>
                        <span class="pcoded-mtext">Notification</span>
                    </a> 
                </li>                
                @endif
                @if(auth()->user()->category_ids == NULL)
                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                    <a href="{{ route('partner.complete-profile') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-bell"></i>
                        </span>
                        <span class="pcoded-mtext">Complete Profile</span>
                    </a> 
                </li>
                @endif
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