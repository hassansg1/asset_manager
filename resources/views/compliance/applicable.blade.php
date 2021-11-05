@extends('components.datatable')
@section('table_header')
    <th>Clause</th>
    <th>Section</th>
    <th>Applicable</th>
    <th>Description</th>
{{--    <th>Compliant</th>--}}
    <th>Proof</th>
@endsection
@section('table_rows')
    @include($route.'.applicable_row')
    <div class="modal fade image-upload-modal-3058" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body3058">
                            <div>
                                <form action="{{route('compliance.storeFile')}}" method="get" class="dropzone" id="file_upload_form" enctype="multipart/form-data">
{{--                                    {{csrf_token()}}--}}
                                    <input type="hidden" name="compliance_id" value="3058">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple" style="visibility: hidden;">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                        </div>

                                        <h4>Drop files here or click to upload.</h4>
                                    </div>
                                </form>
                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary waves-effect waves-light">Send Files</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

@endsection

@section('script')
    @include('compliance.script')
@endsection
