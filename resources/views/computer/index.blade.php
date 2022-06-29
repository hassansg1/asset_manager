@extends('components.datatable')
@section('top_content')
    @include('components.assets_btns')
    <input type="hidden" name="not_in_software_id" id="not_in_software_id" value="">
    <input type="hidden" name="asset_id_filter" id="asset_id_filter" value="">
    @include('computer.partials.modals')
@endsection
@section('top_content_tertiary')
    @include('components.columns_selector',['columns' => $columns ?? []])
@endsection
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
                onclick="toggleSelectAll()"
                type="checkbox" name=""
                id="select_all"></th>
    @foreach($selectedColumns as $key)
        <th>{{ $columns[$key] ?? 'Undefined Column' }}</th>
    @endforeach
    <th>Patch Installation</th>
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
@section('script')
    @include('computer.script')
@endsection
