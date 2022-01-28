<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{url('dashboard')}}" class="waves-effect">
                        <i class="far fa-dot-circle"></i>
                        <span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="javascript:void(0)" class="waves-effect">
                        <i class="far fa-dot-circle"></i>
                        <span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Asset Navigation</span>
                    </a>
                </li>
                <li class="loc_tree"></li>
                <input type="input" class="form-control asset_search"
                       id="tree-input-search" placeholder="Type to search location..."
                       value="">
                <div id="default-tree"></div>
                <li>
                    <a href="{{ route('networks.index') }}" class="waves-effect">
                        <i class="far fa-dot-circle"></i>
                        <span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Networks</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">User Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('system.index')}}" key="t-product-detail">System</a></li>
                        <li><a href="{{route('right.index')}}" key="t-orders">Rights</a></li>
                        <li><a href="{{route('employee.index')}}" key="t-products">Users</a></li>
                        <li><a href="{{route('user_id.index')}}" key="t-products">User ID</a></li>
                    <!-- <li><a href="{{route('system_user_right.index')}}" key="t-orders">System User Rights</a></li> -->
                    {{--                       <li><a href="{{route('asset_group.index')}}" key="t-orders">Asset Access Group</a></li>--}}
                    <!--  <li><a href="{{route('system_user.index')}}" key="t-orders">System User Id</a></li> -->

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Software Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('vendor.index')}}" key="t-orders">Vendors List</a></li>
                        <li><a href="{{route('software.index')}}" key="t-orders">Master Software List</a></li>
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
                        <li><a href="{{route('patch.index')}}" key="t-orders">Master Patch List</a></li>
                        <li><a href="{{route('installed_patch.index')}}" key="t-orders">Installed Patch List</a>
                            {{--                        <li><a href="{{route('patch_approval.index')}}" key="t-orders">Patch Approval</a>--}}
                            {{--                        <li><a href="{{route('patch_policy.index')}}" key="t-orders">Patch Policy</a>--}}
                            {{--                        <li><a href="{{route('patch_report.index')}}" key="t-orders">Patch Report</a>--}}
                            {{--                        <li><a href="{{route('zone_policy.index')}}" key="t-orders">Zone Policy</a>--}}
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('firewall_managment.index')}}" class="">
                        <i class="bx bx-store"></i>
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
                <li>
                    {{--                <li>--}}
                    {{--                    <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
                    {{--                        <i class="bx bx-store"></i>--}}
                    {{--                        <span key="t-ecommerce">Firewall Management</span>--}}
                    {{--                    </a>--}}
                    {{--                    <ul class="sub-menu mm-collapse" aria-expanded="false">--}}
                    {{--                        <li><a href="{{route('ip_address.index')}}" key="t-orders">IP Address</a></li>--}}
                    {{--                        <li><a href="{{route('firewall_zone.index')}}" key="t-products">Firewall Zone</a></li>--}}
                    {{--                        <li><a href="{{route('firewall_address_group.index')}}" key="t-products">Firewall Address Group</a></li>--}}
                    {{--                        <li><a href="{{route('firewall_address_group_memeber.index')}}" key="t-product-detail">Firewall Address Group Members</a></li>--}}
                    {{--                        <li><a href="{{route('policy.index')}}" key="t-product-detail">Policies</a></li>--}}
                    {{--                        <li><a href="{{route('protocol.index')}}" key="t-product-detail">Protocol</a></li>--}}
                    {{--                        <li><a href="{{route('application.index')}}" key="t-product-detail">Application</a></li>--}}
                    {{--                    </ul>--}}
                    {{--                </li>--}}
                    {{--                <li>--}}
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Reports</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('user_asset_report.index')}}" key="t-orders">User Asset Report</a></li>
                    </ul>
                </li>

                {{--@can('See company')--}}
                {{--<li>--}}
                {{--<a href="{{ route('company.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Companies</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See unit')--}}
                {{--<li>--}}
                {{--<a href="{{ route('unit.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Units</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See site')--}}
                {{--<li>--}}
                {{--<a href="{{ route('site.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Sites</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See subsite')--}}
                {{--<li>--}}
                {{--<a href="{{ route('subsite.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">SubSites</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See building')--}}
                {{--<li>--}}
                {{--<a href="{{ route('building.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Buildings</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See room')--}}
                {{--<li>--}}
                {{--<a href="{{ route('room.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Rooms</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See cabinet')--}}
                {{--<li>--}}
                {{--<a href="{{ route('cabinet.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Cabinets</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See asset')--}}
                {{--<li>--}}
                {{--<a href="{{ route('asset.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Assets</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See computer asset')--}}
                {{--<li>--}}
                {{--<a href="{{ route('computer.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Computer Assets</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See network asset')--}}
                {{--<li>--}}
                {{--<a href="{{ route('network.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Network Assets</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See L01 asset')--}}
                {{--<li>--}}
                {{--<a href="{{ route('l_one.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">L01 Assets</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See network asset')--}}
                {{--<li>--}}
                {{--<a href="{{ route('software.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Softwares</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See user')--}}
                {{--<li>--}}
                {{--<a href="{{ route('user.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Users</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See role')--}}
                {{--<li>--}}
                {{--<a href="{{ route('role.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Roles</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
                {{--@can('See permission')--}}
                {{--<li>--}}
                {{--<a href="{{ route('permission.index') }}" class="waves-effect">--}}
                {{--<i class="far fa-dot-circle"></i>--}}
                {{--<span class="badge rounded-pill bg-info float-end"></span>--}}
                {{--<span key="t-dashboards">Permissions</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--@endcan--}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
