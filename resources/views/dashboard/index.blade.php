@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')
    @yield('top_content')
    <div>
        @include('chart.compliance_chart.index')
    </div> <!-- end row -->
@endsection
@section('script')
    @include('dashboard.script')
@endsection
