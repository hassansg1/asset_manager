@extends('layouts.master')

@section('title') {{ $heading }} @endsection
@section('content')
    @include('layouts.top_heading',['heading' => 'Edit '. $heading,'goBack' => route($route.'.index')])
    <div class="row">
        <div class="col-xl-12">
            @include('client.partials.tabs')
            @include('client.partials.tab_content')
        </div>
    </div>
@endsection
