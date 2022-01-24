@extends('components.datatable')
@section('table_header')
    <th>Software</th>
    <th>Patch</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
