@php
    $route_name = Route::currentRouteName();
@endphp

{{-- BEGIN SIDEBAR --}}
<div class="sidebar">
    <div class="logopanel">
        <h1>
            <a href="{{ route('backend.index') }}"></a>
        </h1>
    </div>
    <div class="sidebar-inner">
        {{-- sidebar-top --}}
        @includeif('backend.layouts.slidebar-item.sidebar-top')
        <div class="menu-title">
            Danh sách thao tác
            <div class="pull-right menu-settings">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300"> 
                    <i class="icon-settings"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#" id="reorder-menu" class="reorder-menu">Xắp xếp menu</a></li>
                    <li><a href="#" id="remove-menu" class="remove-menu">Xóa danh mục</a></li>
                    <li><a href="#" id="hide-top-sidebar" class="hide-top-sidebar">Ẩn người dùng &amp; tìm kiếm</a></li>
                </ul>
            </div>
        </div>
        <ul class="nav nav-sidebar">
            <li><a href="{{ route('backend.index') }}"><i class="icon-home"></i><span>Bảng điều khiển</span></a></li>
            <li class="nav-parent {{ (in_array($route_name, ['backend.product.index','backend.product.add', 'backend.product.edit']) ? 'nav-active active' : '') }} ">
                <a href="#"><i class="icon-puzzle"></i><span>Quản lý sản phẩm</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li class="{{ (in_array($route_name, ['backend.product.index','backend.product.edit']) ? 'active' : '') }}">
                        <a href="{{ route('backend.product.index') }}">Danh sách sản phẩm</a>
                    </li>
                    <li class=" {{ ($route_name == 'backend.product.add') ? 'active' : '' }}">
                        <a href="{{ route('backend.product.add') }}">Thêm sản phẩm</a>
                    </li>
                </ul>
            </li>
            <li class="nav-parent {{ (in_array($route_name, ['backend.maker.index', 'backend.maker.create', 'backend.maker.edit']) ? 'nav-active active' : '') }}">
                <a href="#"><i class="fa fa-laptop"></i><span>Quản lý nhà sản xuất</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li class="{{ (in_array($route_name, ['backend.maker.index','backend.maker.edit']) ? 'active' : '') }}">
                        <a href="{{ route('backend.maker.index') }}"> Danh sách nhà sản xuất</a>
                    </li>
                    <li class="{{ ($route_name == 'backend.maker.create') ? 'active' : '' }}">
                        <a href="{{ route('backend.maker.create') }}"> Thêm nhà sản xuất</a>
                    </li>
                </ul>
            </li>
            <li class="nav-parent {{ (in_array($route_name, ['backend.category.index', 'backend.category.create', 'backend.category.edit']) ? 'nav-active active' : '') }}">
                <a href="#"><i class="icon-bulb"></i><span>Quản lý phân loại</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li class="{{ (in_array($route_name, ['backend.category.index','backend.category.edit']) ? 'active' : '') }}">
                        <a href="{{ route('backend.category.index') }}"> Danh sách phân loại</a>
                    </li>
                    <li class="{{ ($route_name == 'backend.category.create') ? 'active' : '' }}">
                        <a href="{{ route('backend.category.create') }}"> Thêm phân loại</a>
                    </li>
                </ul>
            </li>
            <li class="nav-parent {{ (in_array($route_name, ['backend.country.index', 'backend.country.create', 'backend.country.edit']) ? 'nav-active active' : '') }}">
                <a href="#"><i class="icon-bulb"></i><span>Quản lý quốc gia</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li class="{{ (in_array($route_name, ['backend.country.index','backend.country.edit']) ? 'active' : '') }}">
                        <a href="{{ route('backend.country.index') }}"> Danh sách quốc gia</a>
                    </li>
                    <li class="{{ ($route_name == 'backend.country.create') ? 'active' : '' }}">
                        <a href="{{ route('backend.country.create') }}"> Thêm quốc gia</a>
                    </li>
                </ul>
            </li>
            <li class="nav-parent {{ (in_array($route_name, ['backend.user.index', 'backend.user.create', 'backend.user.edit']) ? 'nav-active active' : '') }}">
                <a href="#"><i class="icon-bulb"></i><span>Quản lý người dùng</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li class="{{ (in_array($route_name, ['backend.user.index','backend.user.edit']) ? 'active' : '') }}">
                        <a href="{{ route('backend.user.index') }}"> Danh sách người dùng</a>
                    </li>
                    <li class="{{ ($route_name == 'backend.user.create') ? 'active' : '' }}">
                        <a href="{{ route('backend.user.create') }}"> Thêm người dùng</a>
                    </li>
                </ul>
            </li>
        </ul>
        {{-- @includeif('backend.layouts.slidebar-item.widget-folders') --}}
        <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
                <i class="icon-settings"></i>
            </a>
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
                <i class="icon-size-fullscreen"></i>
            </a>
            <a class="pull-left" href="user-lockscreen.html" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
                <i class="icon-lock"></i>
            </a>
            <a class="pull-left btn-effect" href="user-login-v1.html" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
                <i class="icon-power"></i>
            </a>
        </div>
    </div>
</div>

{{-- END SIDEBAR --}}