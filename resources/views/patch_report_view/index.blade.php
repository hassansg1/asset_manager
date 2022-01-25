@extends('components.datatable')
@section('table_header')
    <th>Software Name</th>
    <th>Patch Name</th>
    <th>Assets on which the patch is installed</th>
@endsection
@section('table_rows')
    @include('patch_report_view.form_rows')
@endsection
<style>
    .filters {
        display: none;
    }
</style>
