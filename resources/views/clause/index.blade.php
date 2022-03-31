@extends('components.datatable')
@section('table_header')
    <th>Number</th>
    <th>Title</th>
    <th>Description</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
@section('below_filters')
    @include('components.clause_filter')
@endsection
@section('custom_heading')
    <a href="{{ route('standard.index') }}">Standards</a> > <a href="{{ route('standard.edit',$standard->id) }}">{{ $standard->name }}</a> > Clauses
@endsection
@include('components.ui_formatter.hide_new_btn')
