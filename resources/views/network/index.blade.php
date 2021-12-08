@extends('components.datatable')
@section('top_content')
    @include('components.assets_btns')
@endsection
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
            onclick="toggleSelectAll()"
            type="checkbox" name=""
            id="select_all"></th>
    <th>Parent</th>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
