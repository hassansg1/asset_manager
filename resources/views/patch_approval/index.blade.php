@extends('layouts.master')

@section('title') Patch Approval @endsection

@section('content')
    @include('layouts.top_heading',['heading' => 'Patch Approval'])
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="start_type">Select One option to Start</label>
                                <select onchange="onTypeChange()" class="form-control select2" name="parent"
                                        id="start_type" required>
                                    <option value="">Select One Option</option>
                                    <option value="software">Select Software(s)</option>
                                    <option value="patch">Select Patches</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12" id="top_content_table"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <button id="confirm_selection" onclick="confirmTopSelection()" class="btn hide btn-primary">Confirm Selection
                                </button>
                            </div>
                        </div>
                        <div class="col-12" id="bottom_content_table"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <button id="confirm_approval" class="btn btn-primary hide">Confirm Approval</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('patch_approval.script')
@endsection
