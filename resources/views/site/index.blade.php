@extends('components.datatable')
@section('table_header')
    <th>Parent</th>
    <th>Name</th>
    <th>Site ID</th>
    <th>Location</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
