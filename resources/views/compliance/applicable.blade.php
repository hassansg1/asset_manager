@extends('components.datatable')
@section('table_header')
    <th>Clause</th>
    <th>Section</th>
    <th>Applicable</th>
    <th>Description</th>
    <th>Compliant</th>
    <th>Proof</th>
@endsection
@section('table_rows')
    @include($route.'.applicable_row')

@endsection

@section('script')
    @include('compliance.script')
@endsection
