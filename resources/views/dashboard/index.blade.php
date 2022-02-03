@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')
    @yield('top_content')
{{--    @include('layouts.top_heading',['heading' => $heading."s"])--}}
    <div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Assets Overview</h4>
                        <div id="pie-chart" class="e-charts"></div>
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
