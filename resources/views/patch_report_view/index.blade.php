@extends('components.datatable')
@section('table_header')
    <th>Software</th>
    <th>Patch</th>
    <th>Asset</th>
@endsection
@section('table_rows')
    @include('patch_report_view.form_rows')
@endsection
<style>
    .filters {
        display: none;
    }
</style>
