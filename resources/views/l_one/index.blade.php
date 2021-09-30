@extends('components.datatable')
@section('top_content')
    <button class="btn btn-primary mr-10">
        <a style="color: white"
           href="{{ url( 'filterAssets/'.str_replace('\\','-',str_replace('??','_',$filter)).'/'.str_replace('\\','-',\App\Http\Controllers\ComputerAssetController::class)) }}">
            Computer
            Assets</a>
    </button>
    <button class="btn btn-primary mr-10">
        <a style="color: white"
           href="{{ url( 'filterAssets/'.str_replace('\\','-',str_replace('??','_',$filter)).'/'.str_replace('\\','-',\App\Http\Controllers\NetworkAssetController::class)) }}">Network
            Assets</a>
    </button>
    <button class="btn btn-primary mr-10">
        <a style="color: white"
           href="{{ url( 'filterAssets/'.str_replace('\\','-',str_replace('??','_',$filter)).'/'.str_replace('\\','-',\App\Http\Controllers\NetworkAssetController::class)) }}">L01
            Assets</a>
    </button>
@endsection
@section('table_header')
    <th>Parent</th>
    <th>Name</th>
    <th>ID</th>
    <th>Description</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
