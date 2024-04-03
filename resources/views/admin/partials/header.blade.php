<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="#"><img src="{{ asset('assets/images/logo.jpg') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="side_menu_title">
            <a class="" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                <img src="{{ asset('assets/admin/img/menu-icon/1.svg') }}" alt>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="">
            <a class="" href="{{ route('admin.categories') }}" aria-expanded="false">
                <img src="{{ asset('assets/admin/img/menu-icon/2.svg') }}" alt>
                <span>Categories</span>
            </a>
        </li>

        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{ asset('assets/admin/img/menu-icon/6.svg') }} " alt>
                <span>Users</span>
            </a>
            <ul>
                <li><a href="#">Partners</a></li>
                <li><a href="#">Members</a></li>
            </ul>
        </li>
        <li class>
            @if (Route::has('login'))
            @auth
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
            @endauth
            @endif
        </li>
    </ul>
</nav>
<section class="main_content dashboard_part">
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="serach_field-area">
                        <div class="search_inner">
                            
                        </div>
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="profile_info">
                        <h5>Admin</h5>
                            <div class="profile_info_iner">
                                <a href="#">Log Out <i class="ti-shift-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>