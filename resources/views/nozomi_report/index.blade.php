@extends('layouts.master')

@section('title') Nozomi Report @endsection

@section('content')
    @include('components.form_errors')
    @include('nozomi_report.fetch_data')
    @include('nozomi_report.content')
@endsection
