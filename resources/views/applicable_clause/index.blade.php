@extends('components.datatable')
@section('table_header')
    <th style="width: 50px">Number</th>
    <th style="max-width: 20px">Title</th>
    <th>Description</th>
    <th>Applicable</th>
    <th>Applicability</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection

@section('script')
    @include('applicable_clause.script')
@endsection
