@php
    $units = getUnits();
    $sites = getSites();
    $sub_sites = getSubSites();
@endphp
@extends('layouts.master')

@section('title') {{ $heading }} @endsection
@section('content')
    @include('layouts.top_heading',['heading' => 'Edit '. $heading,'goBack' => route($route.'.index')])
    <div class="row">
        <div class="col-lg-12">
            @include($route.'.edit_form')
        </div>
        @if(isset($item) && $users)
            <hr class="solid">
        <div class="row">
            <div class="col-md-8">
                <h3>Assigned User</h3>
            </div>
            <div class="col-md-4">
                <div style="text-align: right">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Assign User
                    </button>
                </div>
                <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Assign User ID</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="{{ isset($item) ? $item->id:'' }}unit_id"
                                                   class="form-label required">Unit name</label>
                                            <select class="form-control select2" name="parent_id"
                                                    id="{{ isset($item) ? $item->id:'' }}short_name" required>
                                                <option value="">Search by Name</option>
                                                @foreach(getLocationsForDropDown('sites',isset($item)?'edit':'create',$model ?? null) as $heading => $locations)
                                                    <optgroup label={{ \App\Models\Location::getTypeToModel($heading) }}>
                                                        @foreach($locations as $location)
                                                            <option
                                                                {{ isset($item) && $item->unit_id == $location->id ? 'selected' : '' }}
                                                                value="{{ $location->id }}">{{ $location->text }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="{{ isset($item) ? $item->id:'' }}sub_site_id"
                                                   class="form-label">User</label>
                                            <select class="form-control select2" id="user_id" name="user_id">
                                                <option value="">-Select User-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="assign_user">Save</button>
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
                            <th>Unit</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $value)
                            <tr id="{{ $value->id }}">
                                {{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $value->id }}"--}}
                                {{--                               id="select_check_{{ $value->id }}" class="select_row"></td>--}}
                                @if($value->user_unit)
                                    <td>{{ $value->user_unit->rec_id }}</td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $value->name }}</td>
                                <td><button type="button" class="btn btn-default btn-sm delete_user_id" id="{{ $value->id }}" onclick="return confirm('Are you sure unassign ID?')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
