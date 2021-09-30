@extends('components.datatable')
@section('table_header')
    <th>Parent</th>
    <th>Short Name</th>
    <th>Long Name</th>
    <th>Code</th>
    <th>Contact Person</th>
    <th>OT APN</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
