@extends('components.datatable',['id' => 'dtb'])
@section('table_header')
    <th>Clause</th>
    <th>Section</th>
    <th>Applicable</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.applicable_row')

@endsection

@section('script')
    @include('applicable_clause.script')
@endsection
