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
                    <a href="" onclick="javascript:void(0)" class="waves-effect">
                        <i class="far fa-dot-circle"></i>
                        <span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Asset Navigation</span>
                    </a>
                </li>
                @include('components.tree',['file' => 'tree_node'])

                {{--                <li class="loc_tree">--}}
{{--                    <input type="input" class="form-control" id="tree-input-search" placeholder="Type to search..." value="">--}}
{{--                    <div id="default-tree"></div>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('networks.index') }}" class="waves-effect">
                        <i class="far fa-dot-circle"></i>
                        <span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Networks</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('software.index') }}" class="waves-effect">
                        <i class="far fa-dot-circle"></i>
                        <span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Softwares</span>
                    </a>
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
