@extends('components.datatable')
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
            onclick="toggleSelectAll()"
            type="checkbox" name=""
            id="select_all"></th>
    <th>Clause</th>
    <th>Section</th>
	<th>Locations</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.view_detail_row')

@endsection

@section('script')
    @include('applicable_clause.script')
@endsection
