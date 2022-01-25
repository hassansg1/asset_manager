@extends('components.datatable')
@section('table_header')
    <th>Patch Name</th>
    @if(!isset($request->software_id))
        <th>Software(s) for which patch is approved</th>
    @endif
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
