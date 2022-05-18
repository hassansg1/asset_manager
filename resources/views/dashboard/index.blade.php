@extends('layouts.master')

@section('title') Dashboard @endsection
@section('content')
    @yield('top_content')
{{--    <div class="row">--}}
{{--                <div class="col-sm-2">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <div class="avatar-xs me-3">--}}
{{--                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">--}}
{{--                                                            <i class="bx bx-copy-alt"></i>--}}
{{--                                                        </span>--}}
{{--                                </div>--}}
{{--                                <h5 class="font-size-14 mb-0">Assets</h5>--}}
{{--                            </div>--}}
{{--                            <div class="text-muted mt-4">--}}
{{--                                <h4>{{count(\App\Models\Location::all())}}</h4>--}}
{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-sm-2">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <div class="avatar-xs me-3">--}}
{{--                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">--}}
{{--                                                            <i class="bx bx-archive-in"></i>--}}
{{--                                                        </span>--}}
{{--                                </div>--}}
{{--                                <h5 class="font-size-14 mb-0">Users</h5>--}}
{{--                            </div>--}}
{{--                            <div class="text-muted mt-4">--}}
{{--                                <h4>{{count(\App\Models\User::all())}}</h4>--}}
{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-sm-2">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <div class="avatar-xs me-3">--}}
{{--                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">--}}
{{--                                                            <i class="bx bx-purchase-tag-alt"></i>--}}
{{--                                                        </span>--}}
{{--                                </div>--}}
{{--                                <h5 class="font-size-14 mb-0">Networks</h5>--}}
{{--                            </div>--}}
{{--                            <div class="text-muted mt-4">--}}
{{--                                <h4>{{count(\App\Models\Networks::all())}}</h4>--}}

{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-2">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <div class="avatar-xs me-3">--}}
{{--                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">--}}
{{--                                                            <i class="bx bx-purchase-tag-alt"></i>--}}
{{--                                                        </span>--}}
{{--                                </div>--}}
{{--                                <h5 class="font-size-14 mb-0">Statndards</h5>--}}
{{--                            </div>--}}
{{--                            <div class="text-muted mt-4">--}}
{{--                                <h4>{{count(\App\Models\Standard::all())}}</h4>--}}

{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-2">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <div class="avatar-xs me-3">--}}
{{--                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">--}}
{{--                                                            <i class="bx bx-purchase-tag-alt"></i>--}}
{{--                                                        </span>--}}
{{--                                </div>--}}
{{--                                <h5 class="font-size-14 mb-0">Vendors</h5>--}}
{{--                            </div>--}}
{{--                            <div class="text-muted mt-4">--}}
{{--                                <h4>{{count(\App\Models\Vendor::all())}}</h4>--}}

{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col-md-12">
            @include('chart.compliance_chart.index')
        </div>
    </div>
{{--    <div class="row">--}}
{{--        <div class="col-lg-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title mb-4">Latest Firewall Record</h4>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table align-middle table-nowrap mb-0">--}}
{{--                            <thead class="table-light">--}}
{{--                            <tr>--}}
{{--                                <th class="align-middle">Locations</th>--}}
{{--                                <th class="align-middle">Source Asset</th>--}}
{{--                                <th class="align-middle">Destination Asset</th>--}}
{{--                                <th class="align-middle">Policy</th>--}}
{{--                                <th class="align-middle">Expiry Date</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($firewall as $item)--}}
{{--                                <tr id="{{ $item->id }}">--}}
{{--                                    --}}{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
{{--                                    <td>{{ $item->source_location }}</td>--}}
{{--                                    <td>{{ $item->source_asset }}</td>--}}
{{--                                    <td>{{ $item->destination_asset }}</td>--}}
{{--                                    <td>--}}
{{--                                        @if($item->condition == 'permanent')--}}
{{--                                        <span class="badge badge-pill badge-soft-success font-size-11">Permanent</span>--}}
{{--                                        @elseif($item->condition == 'temporary')--}}
{{--                                            <span class="badge badge-pill badge-soft-danger font-size-11">Temporary</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @if($item->condition == 'temporary')--}}
{{--                                            {{date('d-m-Y', strtotime($item->approvel_expirey_date))}}--}}
{{--                                            {{ $item->approvel_expirey_date }}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <!-- end table-responsive -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title mb-4">Latest UserID Record</h4>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table align-middle table-nowrap mb-0">--}}
{{--                            <thead class="table-light">--}}
{{--                            <tr>--}}
{{--                                <th class="align-middle">User ID</th>--}}
{{--                                <th class="align-middle">Status</th>--}}
{{--                                <th class="align-middle">Validity Date / Expiry Date</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td></td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <!-- end table-responsive -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- end row -->
{{--    <div class="row">--}}
{{--        <div class="col-md-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body" style="position: relative;">--}}
{{--                    <h4 class="card-title mb-4">Assets</h4>--}}
{{--                    <div id="assetsChart" class="e-charts"></div>--}}
{{--                </div>--}}
{{--            </div><!--end card-->--}}
{{--        </div>--}}
{{--        <div class="col-md-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body" style="position: relative;">--}}
{{--                    <h4 class="card-title mb-4">Asset Functions</h4>--}}
{{--                    <div id="assetsFunctions" class="e-charts"></div>--}}
{{--                </div>--}}
{{--            </div><!--end card-->--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@section('script')
    @include('dashboard.script')
@endsection
