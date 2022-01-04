@extends('components.datatable')
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
            onclick="toggleSelectAll()"
            type="checkbox" name=""
            id="select_all"></th>
    <th>Zone</th>
    <th>Patch Duration</th>
    <th>Antivirus Duration</th>
    <th>Action</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
