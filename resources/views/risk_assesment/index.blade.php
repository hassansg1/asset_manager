@extends('components.datatable')
@section('table_header')
    <th>Risk Assessment ID</th>
    <th>Title</th>
    <th>Date</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
