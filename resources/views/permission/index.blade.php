@extends('components.datatable')
@section('table_header')
    <th>Name</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
