@extends('components.datatable')
@section('table_header')
    <th>Version Name</th>
    <th>Standard</th>
    <th>Compliance</th>
    <th>Actions</th>

@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
