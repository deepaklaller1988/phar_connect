<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="line_icon open_miniSide d-none d-lg-block">
                    <img src="{{ asset('assets/partner/img/line_img.png') }}" alt>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <a class="bell_notification_clicker" href="#"> <img
                                    src="{{ asset('assets/partner/img/icon/bell.svg') }}" alt="">
                                <span>2</span>
                            </a>
                            <div class="Menu_NOtification_Wrap">
                                <div class="notification_Header">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="Notification_body">
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_content">
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_content">
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="profile_info">
                        <img src="{{ asset('assets/partner/img/client_img.png') }}" alt="#">
                        <div class="profile_info_iner">
                            <div class="profile_info_details">
                                <a href="{{ route('partner.profile') }}">My Profile </a>
                                @if (Route::has('login'))
                                @auth
                                <a href="{{ route('logout') }}" class="has-arrow"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>