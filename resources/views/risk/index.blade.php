@extends('components.datatable')
@section('table_header')
    <th>Risk Assessment Title</th>
    <th>Risk Number</th>
    <th>Risk Zone</th>
    <th>Threat Source</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
