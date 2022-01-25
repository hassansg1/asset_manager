@extends('components.datatable')
@section('top_content_secondary')
@endsection
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
            onclick="toggleSelectAll()"
            type="checkbox" name=""
            id="select_all"></th>
    <th>Vendor Name</th>
    <th>Software Name</th>
    <th>Version</th>
    <th>Description</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
