@extends('components.datatable')
@section('table_header')
    <th>Port Ip Address</th>
{{--    <th>Port Number</th>--}}
    <th>Device Name</th>
{{--    <th>Port Name</th>--}}

{{--    <th>Port MAC Address</th>--}}
    <th>Port Network</th>
{{--    <th>Connected Port</th>--}}
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
