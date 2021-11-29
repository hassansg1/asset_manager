@extends('components.datatable')
@section('table_header')
    <th>Number</th>
    <th style="max-width: 20px">Title</th>
    <th>Description</th>
    <th>Applicable</th>
{{--    <th>Criteria</th>--}}
    <th>Applicability</th>
{{--    <th>Reason</th>--}}
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection

@section('script')
    @include('applicable_clause.script')
@endsection
