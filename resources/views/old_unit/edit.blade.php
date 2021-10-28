@extends('layouts.master')

@section('title') {{ $heading }} @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') {{ isset($clone) && $clone ? 'Clone' : 'Edit' }} {{ $heading }} @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="item_form" method="post" enctype="multipart/form-data" action="{{ route($route.'.store') }}">
                        @include($route.'.edit_form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
