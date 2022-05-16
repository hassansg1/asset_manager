@extends('layouts.master')

@section('title') Dashboard @endsection
@section('content')
    @yield('top_content')
    <div class="row">
                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-copy-alt"></i>
                                                        </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Assets</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{count(\App\Models\Location::all())}}</h4>
{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Users</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{count(\App\Models\User::all())}}</h4>
{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-purchase-tag-alt"></i>
                                                        </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Networks</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{count(\App\Models\Networks::all())}}</h4>

{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-purchase-tag-alt"></i>
                                                        </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Statndards</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{count(\App\Models\Standard::all())}}</h4>

{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-purchase-tag-alt"></i>
                                                        </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Vendors</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{count(\App\Models\Vendor::all())}}</h4>

{{--                                <div class="d-flex">--}}
{{--                                    <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ms-2 text-truncate">From previous period</span>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <div class="row">
        <div class="col-md-4">
                <div class="card">
                    <div class="card-body" style="position: relative;">
                        <h4 class="card-title mb-4">Radial Chart</h4>

                        <div id="radial_chart" class="apex-charts" dir="ltr" style="min-height: 348.7px;"><div id="apexcharts5u7q8u0x" class="apexcharts-canvas apexcharts5u7q8u0x apexcharts-theme-light" style="width: 431px; height: 348.7px;"><svg id="SvgjsSvg2980" width="431" height="348.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG2982" class="apexcharts-inner apexcharts-graphical" transform="translate(43.5, 0)"><defs id="SvgjsDefs2981"><clipPath id="gridRectMask5u7q8u0x"><rect id="SvgjsRect2984" width="352" height="370" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask5u7q8u0x"><rect id="SvgjsRect2985" width="350" height="372" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG2986" class="apexcharts-radialbar"><g id="SvgjsG2987"><g id="SvgjsG2988" class="apexcharts-tracks"><g id="SvgjsG2989" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 173 32.13658536585365 A 140.86341463414635 140.86341463414635 0 1 1 172.9754146963151 32.13658751132613" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="10.939707317073172" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 173 32.13658536585365 A 140.86341463414635 140.86341463414635 0 1 1 172.9754146963151 32.13658751132613"></path></g><g id="SvgjsG2991" class="apexcharts-radialbar-track apexcharts-track" rel="2"><path id="apexcharts-radialbarTrack-1" d="M 173 48.414634146341456 A 124.58536585365854 124.58536585365854 0 1 1 172.9782557517709 48.41463604388508" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="10.939707317073172" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 173 48.414634146341456 A 124.58536585365854 124.58536585365854 0 1 1 172.9782557517709 48.41463604388508"></path></g><g id="SvgjsG2993" class="apexcharts-radialbar-track apexcharts-track" rel="3"><path id="apexcharts-radialbarTrack-2" d="M 173 64.69268292682926 A 108.30731707317074 108.30731707317074 0 1 1 172.98109680722666 64.69268457644402" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="10.939707317073172" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 173 64.69268292682926 A 108.30731707317074 108.30731707317074 0 1 1 172.98109680722666 64.69268457644402"></path></g><g id="SvgjsG2995" class="apexcharts-radialbar-track apexcharts-track" rel="4"><path id="apexcharts-radialbarTrack-3" d="M 173 80.97073170731707 A 92.02926829268293 92.02926829268293 0 1 1 172.98393786268244 80.97073310900298" fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="10.939707317073172" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 173 80.97073170731707 A 92.02926829268293 92.02926829268293 0 1 1 172.98393786268244 80.97073310900298"></path></g></g><g id="SvgjsG2997"><g id="SvgjsG3002" class="apexcharts-series apexcharts-radial-series" seriesName="Computer" rel="1" data:realIndex="0"><path id="SvgjsPath3003" d="M 173 32.13658536585365 A 140.86341463414635 140.86341463414635 0 0 1 225.76836389303068 303.6062837479274" fill="none" fill-opacity="0.85" stroke="rgba(85,110,230,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="11.278048780487804" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="158" data:value="44" index="0" j="0" data:pathOrig="M 173 32.13658536585365 A 140.86341463414635 140.86341463414635 0 0 1 225.76836389303068 303.6062837479274"></path></g><g id="SvgjsG3004" class="apexcharts-series apexcharts-radial-series" seriesName="Tablet" rel="2" data:realIndex="1"><path id="SvgjsPath3005" d="M 173 48.414634146341456 A 124.58536585365854 124.58536585365854 0 1 1 134.50100470079923 291.48772403013766" fill="none" fill-opacity="0.85" stroke="rgba(52,195,143,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="11.278048780487804" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-1" data:angle="198" data:value="55" index="0" j="1" data:pathOrig="M 173 48.414634146341456 A 124.58536585365854 124.58536585365854 0 1 1 134.50100470079923 291.48772403013766"></path></g><g id="SvgjsG3006" class="apexcharts-series apexcharts-radial-series" seriesName="Laptop" rel="3" data:realIndex="2"><path id="SvgjsPath3007" d="M 173 64.69268292682926 A 108.30731707317074 108.30731707317074 0 1 1 78.27228606040974 225.50842926014354" fill="none" fill-opacity="0.85" stroke="rgba(244,106,106,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="11.278048780487804" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-2" data:angle="241" data:value="67" index="0" j="2" data:pathOrig="M 173 64.69268292682926 A 108.30731707317074 108.30731707317074 0 1 1 78.27228606040974 225.50842926014354"></path></g><g id="SvgjsG3008" class="apexcharts-series apexcharts-radial-series" seriesName="Mobile" rel="4" data:realIndex="3"><path id="SvgjsPath3009" d="M 173 80.97073170731707 A 92.02926829268293 92.02926829268293 0 1 1 92.50938831760077 128.38332538747613" fill="none" fill-opacity="0.85" stroke="rgba(241,180,76,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="11.278048780487804" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-3" data:angle="299" data:value="83" index="0" j="3" data:pathOrig="M 173 80.97073170731707 A 92.02926829268293 92.02926829268293 0 1 1 92.50938831760077 128.38332538747613"></path></g><circle id="SvgjsCircle2998" r="81.55941463414635" cx="173" cy="173" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG2999" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText3000" font-family="Helvetica, Arial, sans-serif" x="173" y="173" text-anchor="middle" dominant-baseline="auto" font-size="16px" font-weight="600" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Total</text><text id="SvgjsText3001" font-family="Helvetica, Arial, sans-serif" x="173" y="205" text-anchor="middle" dominant-baseline="auto" font-size="16px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">249</text></g></g></g></g><line id="SvgjsLine3010" x1="0" y1="0" x2="346" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine3011" x1="0" y1="0" x2="346" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG2983" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 472px; height: 432px;"></div></div><div class="contract-trigger"></div></div></div>
                </div><!--end card-->
        </div>
        <div class="col-md-8">
            @include('chart.compliance_chart.index')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Firewall Record</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                            <tr>
                                <th class="align-middle">Locations</th>
                                <th class="align-middle">Source Asset</th>
                                <th class="align-middle">Destination Asset</th>
                                <th class="align-middle">Policy</th>
                                <th class="align-middle">Expiry Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($firewall as $item)
                                <tr id="{{ $item->id }}">
                                    {{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
                                    <td>{{ $item->source_location }}</td>
                                    <td>{{ $item->source_asset }}</td>
                                    <td>{{ $item->destination_asset }}</td>
                                    <td>
                                        @if($item->condition == 'permanent')
                                        <span class="badge badge-pill badge-soft-success font-size-11">Permanent</span>
                                        @elseif($item->condition == 'temporary')
                                            <span class="badge badge-pill badge-soft-danger font-size-11">Temporary</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->condition == 'temporary')
                                            {{date('d-m-Y', strtotime($item->approvel_expirey_date))}}
{{--                                            {{ $item->approvel_expirey_date }}--}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest UserID Record</h4>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                            <tr>
                                <th class="align-middle">User ID</th>
                                <th class="align-middle">Status</th>
                                <th class="align-middle">Validity Date / Expiry Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    @include('dashboard.script')
@endsection
