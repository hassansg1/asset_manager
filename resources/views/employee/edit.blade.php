@php
    $system = getSystems();
    $assets = getComputerAssets();
@endphp
@extends('layouts.master')

@section('title') {{ $heading }} @endsection
@section('content')
    @include('layouts.top_heading',['heading' => 'Edit '. $heading,'goBack' => route($route.'.index')])
    <div class="row">
        <div class="col-lg-12">
            @include($route.'.edit_form')
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(isset($item) && $userIds)
                    <hr class="solid">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Assigned User ID's</h3>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Assign ID
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="{{ isset($item) ? $item->id:'' }}user_type"
                                                           class="form-label">User ID Type</label>
                                                    <select class="form-control select2" name="user_type" id="user_type">
                                                        <option value="">-Select Type-</option>
                                                        <option value="asset">Asset</option>
                                                        <option value="system">System</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 asset" style="display: none">
                                                <div class="mb-3">
                                                    <label for="{{ isset($item) ? $item->id:'' }}asset_id"
                                                           class="form-label">Assets</label>
                                                    <select class="form-control select2" id="asset_id" name="asset_id">
                                                        <option value="">-Select Asset-</option>
                                                        @foreach($assets as $value)
                                                            <option value="{{$value->id}}">{{$value->rec_id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 system" style="display: none">
                                                <div class="mb-3">
                                                    <label for="{{ isset($item) ? $item->id:'' }}system"
                                                           class="form-label">Systems</label>
                                                    <select class="form-control select2" id="system" name="system">
                                                        <option value="">-Select System-</option>
                                                        @foreach($system as $value)
                                                            <option value="{{$value->id}}">{{$value->name}} ({{$value->system_type->name}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="{{ isset($item) ? $item->id:'' }}account_id" class="form-label">Select
                                                        ID</label>
                                                    <select class="form-control select2" id="account_id" name="account_id[]"
                                                            multiple="multiple">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="assign_id">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>System/Asset</th>
                                    <th>Right</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userIds as $value)
                                    <tr id="{{ $value->id }}">
                                        {{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $value->id }}"--}}
                                        {{--                               id="select_check_{{ $value->id }}" class="select_row"></td>--}}
                                        <td>{{ $value->user_id }}</td>
                                        <td>
                                            @if($value->parent == "asset")
                                                <i>AST:</i> {{ $value->user_id_assets->rec_id }}
                                            @elseif($value->parent == "system")
                                                <i>SYS:</i> {{ $value->user_id_systems->name }}
                                            @endif
                                        </td>
                                        <td>{{ $value->user_rights_id->rights_name->name }}</td>
                                        <td><button type="button" class="btn btn-danger delete_id" id="{{ $value->id }}" onclick="return confirm('Are you sure want to unassign ID?')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
