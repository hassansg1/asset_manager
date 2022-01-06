@extends('components.datatable')
@section('table_header')
    <th>User</th>
    <th>User ID</th>
    <th>Assets</th>
    <th>Rights</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
