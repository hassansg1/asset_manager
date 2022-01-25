@extends('components.datatable')
@section('table_header')
    <th>Patch Name</th>
    @if(!isset($request->software_id))
        <th>Select Software(s) to delete the approval</th>
    @endif
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
