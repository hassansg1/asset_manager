@extends('components.datatable')
@section('table_header')
    <th>Parent</th>
    <th>ID</th>
    <th>Name</th>
    <th>Location</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
