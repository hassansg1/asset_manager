@extends('components.datatable')
@section('table_header')
    <th>ID</th>
    <th>Short Name</th>
    <th>Long Name</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
