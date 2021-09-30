@extends('components.datatable')
@section('table_header')
    <th>Short Name</th>
    <th>Long Name</th>
    <th>ID</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
