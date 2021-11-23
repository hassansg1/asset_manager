<div class="table-responsive">
    <table class="table mb-0">

        <thead class="table-light">
        <tr>
            <th>Location Name</th>
            <th>Compliant</th>
            <th>Comment</th>
            <th>Files</th>
        </tr>
        </thead>
        <tbody>
        @foreach($locations as $location)
            <tr>
                <td>
                    {{ $location->show_name }}
                </td>
                <td>
                    <select class="form-control" name="compliant"
                    >
                        <option value="{{ App\Models\ComplianceData::COMPLIANT_ALL }}">Select Compliant</option>
                        <option value="{{ App\Models\ComplianceData::COMPLIANT_YES }}">Yes</option>
                        <option value="{{ App\Models\ComplianceData::COMPLIANT_NO }}">No</option>
                        <option value="{{ App\Models\ComplianceData::COMPLIANT_UNDER_PROCESS }}">Under Process</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="comment" class="form-control">
                </td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target=".image-upload-modal-{{ $location->id }}">
                        <i class="fa fa-file-image" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            <div class="modal fade image-upload-modal-{{ $location->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <form action="{{url('store/file/compliance')}}/{{$location->id}}" method="post"
                                              class="dropzone" id="file_upload_form" enctype="multipart/form-data">
                                            <input type="hidden" name="compliance_data_id" value="{{ $location->id }}">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple="multiple" style="visibility: hidden;">
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                    </div>

                                                    <h4>Drop files here or click to upload.</h4>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="button" class="btn btn-primary waves-effect waves-light">Send Files
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        @endforeach
        </tbody>
    </table>
</div>
