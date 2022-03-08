@extends('components.datatable')
@section('table_header')
    <th>Compliance Version</th>
    <th>Complaint</th>
    <th>Non Complaint</th>
    <th>Under Process</th>
    <th>Not Evaluated</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection

