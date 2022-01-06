@extends('components.datatable')
@section('table_header')
{{--    <th class="select_all_checkbox" style="width: 10px"><input--}}
{{--            onclick="toggleSelectAll()"--}}
{{--            type="checkbox" name=""--}}
{{--            id="select_all"></th>--}}
    <th>Asset ID</th>
    <th>Firewall Policy Name</th>
    <th>Application Name</th>
    <th>Description</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
