@extends('components.datatable')
@section('table_header')
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email Address</th>
    <th>Phone Number</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
