<style>
    span.lan-3 {
        color: rgb(0, 0, 0) !important;
    }

    a.lan-4 {
        color: black !important;
    }

    ::before {
        color: black;
    }

    .simplebar-content-wrapper {
        background: white;
    }

    input.form-control,
    textarea.form-control {
        background: #ec322314 !important;
    }

    input.btn.btn-primary {
        background: red !important;
        border: none !important;
    }

    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-link.active {
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
        position: relative;
        margin-bottom: 10px;
        background-color: transparent !important;
    }

    a.sidebar-link.sidebar-title.clickable:hover {
        background: rgba(128, 128, 128, 0.317)  !important;


    }
</style>
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a style="font-weight:900; text-decoration: none" href="{{ url('/') }}" class=" row justify-content-center">Brewery</a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a style="font-weight:900;color: #ec3223;text-decoration: none" href="{{ url('/') }}">Brewery</a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a style="font-weight:900;color: #ec3223;text-decoration: none" href="{{ url('/') }}">Brewery</a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/dashboard' ? 'active1' : '' }}"
                            href="{{ url('/admin/dashboard')}}"> <span class="lan-3">&nbsp&nbspDashboard</span>

                        </a>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/header' ? 'active1' : '' }}"
                            href="{{ url('/admin/header/edit/' . \Crypt::encrypt(1)) }}"> <span class="lan-3">&nbsp&nbspHeader</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/breadcrumb' ? 'active1' : '' }}"
                            href="{{ url('/admin/breadcrumb') }}"> <span class="lan-3">&nbsp&nbspHero Slider</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/social_icon' ? 'active1' : '' }}"
                            href="{{ url('/admin/social_icon') }}"> <span class="lan-3">&nbsp&nbspSocial Icon</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/review' ? 'active1' : '' }}"
                            href="{{ url('/admin/review') }}"> <span class="lan-3">&nbsp&nbspReview</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/category' ? 'active1' : '' }}"
                            href="{{ url('/admin/category') }}"> <span class="lan-3">&nbsp&nbspLocation</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/studio' ? 'active1' : '' }}"
                            href="{{ url('/admin/studio') }}"> <span class="lan-3">&nbsp&nbspStudio</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/client' ? 'active1' : '' }}"
                            href="{{ url('/admin/client') }}"> <span class="lan-3">&nbsp&nbspClient</span>

                        </a>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/employee' ? 'active1' : '' }}"
                            href="{{ url('/admin/employee') }}"> <span class="lan-3">&nbsp&nbspStaff</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/service' ? 'active1' : '' }}"
                            href="{{ url('/admin/service') }}"> <span class="lan-3">&nbsp&nbspService</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/gear' ? 'active1' : '' }}"
                            href="{{ url('/admin/gear') }}"> <span class="lan-3">&nbsp&nbspGear</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/floor_plan' ? 'active1' : '' }}"
                            href="{{ url('/admin/floor_plan') }}"> <span class="lan-3">&nbsp&nbspFloor plan</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/history' ? 'active1' : '' }}"
                            href="{{ url('/admin/history') }}"> <span class="lan-3">&nbsp&nbspHistory</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/plan' ? 'active1' : '' }}"
                            href="{{ url('/admin/plan') }}"> <span class="lan-3">&nbsp&nbspStudio Booking</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/heading_other_service' ? 'active1' : '' }}"
                            href="{{ url('/admin/heading_other_service/edit/' . \Crypt::encrypt(1)) }}"> <span class="lan-3">&nbsp&nbspHeading of Service</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/other_service' ? 'active1' : '' }}"
                            href="{{ url('/admin/other_service') }}"> <span class="lan-3">&nbsp&nbspOther Service</span>

                        </a>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == '/admin/map' ? 'active1' : '' }}"
                            href="{{ url('/admin/map') }}"> <span class="lan-3">&nbsp&nbspMap & Address</span>

                        </a>
                    </li>

                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == '/admin/studio_tour' ? 'active1' : '' }}"
                            href="{{ url('/admin/studio_tour') }}"> <span class="lan-3">&nbsp&nbspStudio Tour</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/footer' ? 'active1' : '' }}"
                            href="{{ url('/admin/footer/edit/' . \Crypt::encrypt(1)) }}"> <span class="lan-3">&nbsp&nbspFooter</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/term_condition' ? 'active1' : '' }}"
                            href="{{ url('/admin/term_condition/edit/' . \Crypt::encrypt(1)) }}"> <span class="lan-3">&nbsp&nbsp Terms & Conditions</span>

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == 'admin/privacy_policy' ? 'active1' : '' }}"
                            href="{{ url('/admin/privacy_policy/edit/' . \Crypt::encrypt(1)) }}"> <span class="lan-3">&nbsp&nbspPrivacy Policy</span>

                        </a>
                    </li>

                    {{-- <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title clickable {{ request()->route()->uri == 'admin/car_brands' ? 'active' : ' ' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspCar Brands</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri == 'admin/car_brands' ? 'block' : 'none' }}">

                            <li><a class="lan-4 " href="{{ url('admin/car_brands') }}" data-bs-original-title=""
                                    title="">Car Brands</a>
                            </li>
                            <li><a class="lan-4" href="{{ url('admin/car_brands/add') }}" data-bs-original-title=""
                                    title="">Add Car Brands</a>
                            </li>
                        </ul>
                    </li> --}}

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
