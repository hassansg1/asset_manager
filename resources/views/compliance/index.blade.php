@extends('components.datatable')
@section('table_header')
    <th>Clause</th>
    <th>Section</th>
    <th>Applicable</th>
    <th>Reason</th>
    <th>Compliant</th>
    <th>Proof</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection

@section('script')
    @include('compliance.script')
@endsection