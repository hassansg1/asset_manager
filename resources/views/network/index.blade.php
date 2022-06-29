@extends('components.datatable')
@section('top_content')
    @include('components.assets_btns')
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
    <th>Actions</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
@section('script')
    @include('computer.script')
@endsection
