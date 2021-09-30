@extends('components.datatable')
@section('table_header')
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Mobile No.</th>
    <th>Role</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
