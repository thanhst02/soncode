<!-- BEGIN TOPBAR -->
<div class="topbar">
    <div class="header-left">
        <div class="topnav">
            <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
        </div>
    </div>
    <div class="header-right">
        <ul class="header-menu nav navbar-nav">
            <!-- BEGIN USER DROPDOWN -->
            <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    @if(isset(Auth::user()->image->image_name))
                        <img src="{{ asset('public/dataUpload/images/'.Auth::user()->image->image_name) }}">
                    @else
                        <img src="{{ asset('public/dataUpload/images/avatar.png') }}">
                    @endif
                    
                    <span class="username">{{ Auth::user()->human->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('frontend.personal.index') }}"><i class="icon-user"></i><span>My Profile</span></a>
                    </li>
                    <li>
                        <a href="{{ route('frontend.personal.setting') }}"><i class="icon-settings"></i><span>Account Settings</span></a>
                    </li>
                    <li>
                        <a href="{{ route('account.logout') }}"><i class="icon-logout"></i><span>Logout</span></a>
                    </li>
                </ul>
            </li>
            <!-- END USER DROPDOWN -->
            <!-- CHAT BAR ICON -->
            {{-- <li id="quickview-toggle"><a href="#"><i class="icon-bubbles"></i></a></li> --}}
        </ul>
    </div>
    <!-- header-right -->
</div>
                        <!-- END TOPBAR -->