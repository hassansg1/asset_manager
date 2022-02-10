<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
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
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
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
                        <li><a href="{{route('risk_assesment.index')}}" key="t-orders">Risk Assesment</a></li>
                        <li><a href="{{route('risk.index')}}" key="t-orders">Risk</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Reports</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('user_asset_report.index')}}" key="t-orders">User Asset Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Nozomi Management</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{url('nozomi/credentials')}}" key="t-orders">Credentials</a></li>
                        <li><a href="{{url('nozomi/report')}}" key="t-orders">Report</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
