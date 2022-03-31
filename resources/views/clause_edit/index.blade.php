@extends('components.datatable')
@section('table_header')
    <th>Number</th>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
@endsection
@section('below_filters')
    @include('components.clause_filter')
@endsection
@section('custom_heading')
    <a href="{{ route('standard.index') }}">Standards</a> > <a href="{{ route('standard.edit',$standard->id) }}">{{ $standard->name }}</a> > Clauses
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
