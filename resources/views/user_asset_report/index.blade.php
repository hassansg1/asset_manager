@extends('components.datatable')
@include('components.ui_formatter.hide_new_btn')
@section('table_header')
    <th style="width: 200px">User</th>
    <th >User ID</th>
{{--    <th >System</th>--}}
    <th>Assets</th>
    <th>Rights</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
