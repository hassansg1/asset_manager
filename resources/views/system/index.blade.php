@extends('components.datatable')
@section('table_header')
{{--    <th class="select_all_checkbox" style="width: 10px"><input--}}
{{--            onclick="toggleSelectAll()"--}}
{{--            type="checkbox" name=""--}}
{{--            id="select_all"></th>--}}
    <th style="width: 200px">System Name</th>
    <th style="width: 200px">System Type</th>
    <th>Description</th>
    <th style="width: 100px">Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
