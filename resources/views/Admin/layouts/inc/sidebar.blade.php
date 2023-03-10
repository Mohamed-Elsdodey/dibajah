<!-- ========== App Menu ========== -->

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('admin.index')}}" class="logo logo-dark">
                    <span class="logo-sm">
{{--                        <img src="{{get_file($settings->header_logo)}}" alt="" height="22">--}}
                    </span>
            <span class="logo-lg">
{{--                        <img src="{{get_file($settings->header_logo)}}" alt="" height="40">--}}
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin.index')}}" class="logo logo-light">
                    <span class="logo-sm">
{{--                        <img src="{{get_file($settings->header_logo)}}" alt="" height="22">--}}
                    </span>
            <span class="logo-lg">
{{--                        <img src="{{get_file($settings->header_logo)}}" alt="" height="40">--}}
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">dibajah</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{route('admin.index')}}">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">الرئيسية</span>
                        </a>
                    </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('categories.index')}}">
                        <i class="fa fa-list"></i> <span data-key="t-dashboards">الاقسام</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('countries.index')}}">
                        <i class="fa fa-flag"></i> <span data-key="t-dashboards">الدول</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('areas.index')}}">
                        <i class="fa fa-area-chart"></i> <span data-key="t-dashboards">المناطق</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('cities.index')}}">
                        <i class="fa fa-city"></i> <span data-key="t-dashboards">المدن</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('contacts.index')}}">
                        <i class="fa fa-message"></i> <span data-key="t-dashboards">طلبات التواصل</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('markets.index')}}">
                        <i class="fa fa-shopping-cart"></i> <span data-key="t-dashboards"> التجار</span>
                    </a>
                </li> <!-- end Dashboard Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('settings.index')}}">
                        <i class="fa fa-cog"></i> <span data-key="t-dashboards"> الاعدادات</span>
                    </a>
                </li> <!-- end Dashboard Menu -->


                <li class="nav-item">
                        <a class="nav-link menu-link" href="#items" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="items">
                            <i class="fa-solid fa-users"></i> <span
                                data-key="t-apps">   المستخدمين </span>
                        </a>
                        <div class="collapse menu-dropdown" id="items">
                            <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{route('admins.index')}}">
                                            <i class="fa-solid fa-user-secret"></i> <span
                                                data-key="t-dashboards">المشرفين</span>
                                        </a>
                                    </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{route('users.index')}}">
                                            <i class="fa-solid fa-user"></i> <span
                                                data-key="t-dashboards"> العملاء</span>
                                        </a>
                                    </li>

                            </ul>

                        </div>
                    </li>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>


