@extends('components.datatable')
@section('table_header')
    <th>ID</th>
    <th>Document Number</th>
    <th>Version</th>
    <th>Date</th>
    <th>Title</th>
    <th>Description</th>
    <th>Category</th>
    <th>Sub Category</th>
    <th>Attachment</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
