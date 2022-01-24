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

                <a href="{{ url('') }}" class="logo logo-light">
                    <h3 style="    margin-top: 20px;color: white;font-size: 25px;">OTCM</h3>
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
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="align-middle">Organization Structure</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <a href="{{ route('company.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Companies</span>
                    </a>
                    <a href="{{ route('unit.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Units</span>
                    </a>
                    <a href="{{ route('site.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Sites</span>
                    </a>
                    <a href="{{ route('subsite.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Subsites</span>
                    </a>
                    <a href="{{ route('building.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Buildings</span>
                    </a>
                    <a href="{{ route('room.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Rooms</span>
                    </a>
                    <a href="{{ route('cabinet.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Cabinets</span>
                    </a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="align-middle">Import / Export</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <a href="{{ route('import.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Import Data</span>
                    </a>
                    <a href="{{ route('clause_import.index') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Import Clauses</span>
                    </a>
                    <a href="{{ route('library_import.index') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Import Document Library</span>
                    </a>
                    <a href="{{ route('compliance_data_import.index') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Import Compliance Data</span>
                    </a>
                    <a href="{{ route('export_templates') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Export Data Templates</span>
                    </a>
                    <a href="{{ route('software_import.index') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Import Software Data</span>
                    </a>
                    <a href="{{ route('patch_import.index') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Import Patch Data</span>
                    </a>
                    <a href="{{ route('firewall_import.index') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Import Firewall Data</span>
                    </a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="align-middle">Standards / Compliance</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <a href="{{ route('standard.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Standards List</span>
                    </a>
                    <a href="{{ route('applicable_standard.index') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Applicable Standards</span>
                    </a>
                    <a href="{{ route('version.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Compliance Version</span>
                    </a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="align-middle">More</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <a href="{{ route('approval.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Approval Requests</span>
                    </a>
                    <a href="{{ route('log.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Logs</span>
                    </a>
                    {{--                    <a href="{{ route('compliance.index') }}" class="dropdown-item notify-item language" data-lang="eng">--}}
                    {{--                        <span class="align-middle">Compliance</span>--}}
                    {{--                    </a>--}}
                    {{--                     <a href="{{ route('compliance.applicable') }}" class="dropdown-item notify-item language" data-lang="eng">--}}
                    {{--                        <span class="align-middle">Applicable Compliance</span>--}}
                    {{--                    </a>--}}
                    <a href="{{ route('task') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Task</span>
                    </a>
                    <a href="{{ route('attachment.index') }}" class="dropdown-item notify-item language"
                       data-lang="eng">
                        <span class="align-middle">Document Library</span>
                    </a>
                    <a href="{{ route('approver.index') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <span class="align-middle">Approvers</span>
                    </a>
                </div>
            </div>

        </div>

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
                <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    {{--<span class="badge bg-danger rounded-pill">3</span>--}}
                </button>
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

            <div class="dropdown d-inline-block">
                <button type="button" onclick="location.href='{{ url('/settings') }}'"
                        class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>

<!--  Change-Password example -->
<div class="modal fade change-password" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password"
                               class="form-control @error('current_password') is-invalid @enderror"
                               name="current_password" autocomplete="current_password"
                               placeholder="Enter Current Password" value="{{ old('current_password') }}">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword"
                                data-id="{{ Auth::user()->id }}"
                                type="submit">Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
