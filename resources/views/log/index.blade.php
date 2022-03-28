@extends('components.datatable')
@section('table_header')
    <th>Type</th>
    <th>Id</th>
    <th>Action</th>
    <th>Changes</th>
    <th>Changed by</th>
    <th>Changed At</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
