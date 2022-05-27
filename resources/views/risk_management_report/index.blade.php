@extends('components.datatable')
@section('top_content_tertiary')
    @include('components.columns_selector',['columns' => $columns ?? []])
@endsection
@section('table_header')
    @foreach($selectedColumns as $key)
        <th>{{ $columns[$key] ?? 'Undefined Column' }}</th>
    @endforeach
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
@include('components.ui_formatter.hide_new_btn')