@extends('components.datatable')
@section('table_header')
    <th>Risk Assesment ID</th>
    <th>Title</th>
    <th>Date</th>
    <th>Description</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
