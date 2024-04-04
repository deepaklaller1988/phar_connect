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
                <li class="pcoded-hasmenu pcoded-trigger" dropdown-icon="style1" subitem-icon="style1">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-users"></i>
                        </span>
                        <span class="pcoded-mtext">Users</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="#" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Partners</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="#" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Members</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" ">
                    <a href="#" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-log-out"></i>
                        </span>
                        <span class="pcoded-mtext">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>