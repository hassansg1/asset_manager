@extends('components.datatable')
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
            onclick="toggleSelectAll()"
            type="checkbox" name=""
            id="select_all"></th>
    <th>Aseet ID</th>
    <th>Aseet Port</th>
    <th>IP Address</th>
    <th>Default Gateway</th>
    <th>Connected Aseet ID</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
