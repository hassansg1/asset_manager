@extends('components.datatable')
@section('table_header')
    <th>Source Zone</th>
    <th>Destination Zone</th>
    <th>Source Location</th>
    <th>Destination Location</th>
    <th>Status</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
