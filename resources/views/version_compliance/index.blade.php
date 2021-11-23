@extends('components.datatable',['id' => 'dtb'])
@section('table_header')
    <th>Clause</th>
    <th>Section</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')

@endsection

@section('script')
    @include('applicable_clause.script')
@endsection
