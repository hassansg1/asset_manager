@extends('components.datatable')
@section('table_header')
    <th>Clause</th>
    <th>Section</th>
	<th>Locations</th>
@endsection
@section('table_rows')
    @include($route.'.view_detail_row')

@endsection

@section('script')
    @include('compliance.script')
@endsection
