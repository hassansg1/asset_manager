@extends('components.datatable',['id' => 'dtb'])
@section('table_header')
    <th>Number</th>
    <th>Title</th>
    <th>Description</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
@section('below_filters')
    @include('components.clause_filter')
@endsection
@section('script')
    @include('applicable_clause.script')
@endsection
@include('components.ui_formatter.hide_new_btn')
