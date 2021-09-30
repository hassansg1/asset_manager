@extends('layouts.master')

@section('title') {{ $heading }} @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') Create {{ $heading }} @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form method="post" enctype="multipart/form-data" action="{{ route($route.'.store') }}">
                @include($route.'.form')
                @include('components.form_submit_btns')
            </form>
        </div>
    </div>
@endsection
