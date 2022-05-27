<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{url('dashboard')}}" class="waves-effect">
                        <i class="fa fa-home"></i>
                        <span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="far fa-user"></i>
                        <span key="t-ecommerce">Asset Managment</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li class="loc_tree"></li>
                        <div id="default-tree"></div>
                        <li><a href="{{route('asset_function.index')}}" key="t-product-detail">Asset Functions</a></li>
                        <li><a href="{{route('process.index')}}" key="t-products">Processes & Criticality</a></li>
                        <li><a href="{{ route('networks.index') }}" class="waves-effect">Networks</a></li>
                    </ul>
                </li>


                {{--                <input type="input" class="form-control asset_search"--}}
                {{--                       id="tree-input-search" placeholder="Type to search location..."--}}
                {{--                       value="">--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="far fa-user"></i>
                        <span key="t-ecommerce">User Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('system.index')}}" key="t-product-detail">System</a></li>
                        <li><a href="{{route('right.index')}}" key="t-orders">Rights</a></li>
                        <li><a href="{{route('employee.index')}}" key="t-products">Users</a></li>
                        <li><a href="{{route('user_id.index')}}" key="t-products">User ID</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cast"></i>
                        <span key="t-ecommerce">Software Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('vendor.index')}}" key="t-orders">Vendors List</a></li>
                        <li><a href="{{route('software.index')}}" key="t-orders">Software List</a></li>
                        <li><a href="{{route('software_component.index')}}" key="t-orders">Software Component List</a>
                        </li>
                        <li><a href="{{route('installed_software.index')}}" key="t-orders">Installed Software List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Patch Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('patch.index')}}" key="t-orders">Patch List</a></li>
                        <li><a href="{{route('installed_patch.index')}}" key="t-orders">Installed Patch List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('firewall_managment.index')}}" class="">
                        <i class="bx bx-shield"></i>
                        <span key="t-ecommerce">Firewall Management</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Risk Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('risk_assesment.index')}}" key="t-orders">Risk Assessment</a></li>
                        <li><a href="{{route('risk.index')}}" key="t-orders">Risk</a>
                        </li>
                    </ul>
                </li>

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
{{--                        <i class="bx bx-file"></i>--}}
{{--                        <span key="t-ecommerce">Reports</span>--}}
{{--                    </a>--}}

{{--                    <ul class="sub-menu mm-collapse" aria-expanded="false">--}}
{{--                        <li><a href="{{route('user_asset_report.index')}}" key="t-orders">User Asset Report</a></li>--}}
{{--                        <li><a href="{{url('reports/ports')}}" key="t-orders">Ports Report</a></li>--}}
{{--                        <li><a href="{{url('reports/ip_address')}}" key="t-orders">IP Address Report</a></li>--}}
{{--                        <li><a href="{{url('reports/clauses_report')}}" key="t-orders">Clauses Report</a></li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('reports/asset_report') }}" class="waves-effect">--}}
{{--                                <span key="t-dashboards">Asset Report</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('reports/firewall_report') }}" class="waves-effect">--}}
{{--                                <span key="t-dashboards">Firewall Report</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('reports/risk_management_report') }}" class="waves-effect">--}}
{{--                                <span key="t-dashboards">Risk Management Report</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('reports/software_report') }}" class="waves-effect">--}}
{{--                                <span key="t-dashboards">Software Report</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('reports/patch_report') }}" class="waves-effect">--}}
{{--                                <span key="t-dashboards">Patch Management Report</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('reports/installed_software_report') }}" class="waves-effect">--}}
{{--                                <span key="t-dashboards">Installed Software Report</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('reports/installed_patch_report') }}" class="waves-effect">--}}
{{--                                <span key="t-dashboards">Installed Patches Report</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-align-justify"></i>
                        <span key="t-ecommerce">Nozomi Reports</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{url('nozomi/devices/report')}}" key="t-orders">Devices found in nozomi but
                                missing in OTCM </a></li>
                        <li><a href="{{url('nozomi/otcm/devices/report')}}" key="t-orders">Devices found in OTCM but
                                missing in Nozomi</a></li>
                        <li><a href="{{url('nozomi/otcm/nozomi/devices/report')}}" key="t-orders">Devices found in both
                                but data is different</a></li>
                    </ul>
                </li>
                {{--                <li>--}}
                {{--                    <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
                {{--                        <i class="bx bx-store"></i>--}}
                {{--                        <span key="t-ecommerce">Nozomi Management</span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="sub-menu mm-collapse" aria-expanded="false">--}}

                {{--                        <li><a href="{{url('nozomi/report')}}" key="t-orders">Devices in Nozomi Report</a></li>--}}
                {{--                        <li><a href="{{url('nozomi/otcm/devices/report')}}" key="t-orders">Devices in OTCM Report</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
