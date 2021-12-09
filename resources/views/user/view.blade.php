@extends('layouts.master_secondry')

@section('title') {{ $heading }} @endsection
@section('content')
    @include('layouts.top_heading',['heading' => 'Edit '. $heading,'goBack' => route($route.'.index')])
    <div class="row">
        <div class="col-xl-12">
            @include($route.'.edit_form')
        </div>
    </div>
@endsection
