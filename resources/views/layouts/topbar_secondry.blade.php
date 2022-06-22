<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset ('/assets/images/logo.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset ('/assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>

                <a onclick="location.href='{{url('')}}'" class="logo logo-light">
                    <h3 style="    margin-top: 20px;color: white;font-size: 25px;">@if(getSetting()) {{getSetting()->title}} @else OTCM @endif</h3>
                    {{--                    <span class="logo-sm">--}}
                        {{--                        <img src="{{ URL::asset ('/assets/images/logo.png') }}" alt="" height="22">--}}
                    {{--                    </span>--}}
                    {{--                    <span class="logo-lg">--}}
                        {{--                        <img src="{{ URL::asset ('/assets/images/logo.png') }}" alt="" height="19">--}}
                    {{--                    </span>--}}
                </a>
            </div>


            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

           <div class="d-flex">

    <div class="dropdown d-inline-block d-lg-none ms-2">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="mdi mdi-magnify"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
    aria-labelledby="page-header-search-dropdown">

    <form class="p-3">
        <div class="form-group m-0">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="@lang('translation.Search')"
                aria-label="Search input">

                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                s
            </div>
        </div>
    </form>
</div>
</div>

<div class="dropdown d-none d-lg-inline-block ms-1">
    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
        <i class="bx bx-fullscreen"></i>
    </button>
</div>

<div class="dropdown d-inline-block">
{{--    <button type="button" class="btn header-item noti-icon waves-effect"--}}
{{--    id="page-header-notifications-dropdown"--}}
{{--    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--    <i class="bx bx-bell bx-tada"></i>--}}
{{--    --}}{{--<span class="badge bg-danger rounded-pill">3</span>--}}
{{--</button>--}}
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
aria-labelledby="page-header-notifications-dropdown">
<div class="p-3">
    <div class="row align-items-center">
        <div class="col">
            <h6 class="m-0" key="t-notifications"> @lang('translation.Notifications') </h6>
        </div>
        <div class="col-auto">
            <a href="#!" class="small" key="t-view-all"> @lang('translation.View_All')</a>
        </div>
    </div>
</div>
<div data-simplebar style="max-height: 230px;">
    @foreach(getThreeNotifications() as $notification)
    <a href="" class="text-reset notification-item">
        <div class="media">
            {{--<div class="avatar-xs me-3">--}}
                {{--<span class="avatar-title bg-primary rounded-circle font-size-16">--}}
                    {{--<i class="bx bx-cart"></i>--}}
                {{--</span>--}}
            {{--</div>--}}
            @php
            $day1 = $notification->created_at;
            $day1 = strtotime($day1);
            $day2 =  date("Y-m-d h:i:sa");
            $day2 = strtotime($day2);

            $diffHours = round(($day2 - $day1) / 3600*60*60);
            $d1 = date_create('@' . (($day2 = time()) + $diffHours))->diff(date_create('@' . $day2));

            $dateTime ="";
            // $d3 = $d1->format('%a days %h hours %i minutes');


            if($d1->format('%a') == '0'  && $d1->format('%h') == '0' && $d1->format('%i') == '0')
            {
                $dateTime = "Now";
            }
            elseif($d1->format('%a') == '0' && $d1->format('%h') <= '0' && $d1->format('%h') <= '24' && $d1->format('%i') > '0')
            {
                $dateTime = $d1->format('%i min');
            }
            elseif($d1->format('%a') == '0' && $d1->format('%h') > '0' && $d1->format('%h') < '24' )
            {
                $dateTime = $d1->format('Today %h hours ago');
            }
            elseif($d1->format('%a') > '0' && $d1->format('%a') <= '1' )
            {
                $dateTime =  "Yesterday";
            }
            else
            {
                $dateTime =  date('d ,M Y',strtotime($notification->created_at));
            }

            @endphp
            <div class="media-body">
                <h6 class="mt-0 mb-1"
                key="t-your-order">{{ $notification->heading }}</h6>
                <div class="font-size-12 text-muted">
                    <p class="mb-1"
                    key="t-grammer">{{ $notification->message }}</p>
                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                        key="t-min-ago">
                        {{ $dateTime }}
                        {{-- @lang('translation.3_min_ago') --}}
                    </span></p>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<div class="p-2 border-top d-grid">
    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
        <i class="mdi mdi-arrow-right-circle me-1"></i> <span
        key="t-view-more">@lang('translation.View_More')</span>
    </a>
</div>
</div>
</div>

<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
</button>
<div class="dropdown-menu dropdown-menu-end">
    <!-- item-->

    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal"
    data-bs-target=".change-password"><i
    class="bx bx-wrench font-size-16 align-middle me-1"></i> <span
    key="t-settings">@lang('translation.Settings')</span></a>

    <a class="dropdown-item text-danger" href="javascript:void(0);"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
    key="t-logout">@lang('translation.Logout')</span></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
</div>
<div>
<a onclick="location.href='{{url('dashboard')}}'">
    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
            <i class="bx bx-windows
             bx-spin"></i>
        </button>
    </div>
</a>
</div>

</div>
        </div>
    </header>
