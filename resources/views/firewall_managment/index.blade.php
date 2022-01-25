@extends('components.datatable')
@section('table_header')
    <th>Source Location</th>
    <th>Source Zone</th>
    <th>Destination Location</th>
    <th>Destination Zone</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
