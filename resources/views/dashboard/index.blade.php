@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')
    @yield('top_content')
    {{--    @include('layouts.top_heading',['heading' => $heading."s"])--}}
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-heading">
                        <select style="width: 30%" class="form-control" onchange="renderComplianceChart($(this).val())" name="select_version"
                                id="select_version">
                            <option value="">Select Version</option>
                            @foreach(\App\Models\ComplianceVersion::all() as $version)
                                <option selected value="{{ $version->id }}">{{ $version->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <div id="pie-chart" class="e-charts"></div>
                        <div id="compliance_table"></div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end row -->
@endsection
@section('script')
    <!-- apexcharts -->
    {{--    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>--}}

    <!-- dashboard init -->
    @include('dashboard.script')
@endsection
