<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{url('/settings')}}" class="waves-effect">
                        <i class="far fa-dot-circle"></i>
                        <span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">General Settings</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">OTCM Administration/ Settings</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="#" key="t-products">Help File Definition</a></li>
                        <li><a href="#" key="t-product-detail">Support</a></li>
                        <li><a href="#" key="t-orders">Cyber Security Standards Master List</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Cybersecurity Requirements Settings</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="#" key="t-products">Applicable Standards</a></li>
                        <li><a href="#" key="t-product-detail">Policies</a></li>
                        <li><a href="#" key="t-orders">Zones</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Client Specific Admin Settings</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{ route('user.index') }}" key="t-products">User List</a></li>
                        <li><a href="{{ route('role.index') }}" key="t-product-detail">Roles</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
