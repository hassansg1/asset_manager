<div class="table-responsive">
    <table class="table mb-0" id="location_table">

        <thead class="table-light">
            <tr>
                <th>Location Name</th>
                <th>Compliant</th>
                <th>Comment</th>
                <th>Files</th>
            </tr>
        </thead>
        <tbody>
            <input type="hidden" name="item" id="item" class="form-control" value="{{$item_id}}">
            @foreach($locations as $location)
            <tr class="parent_row">
                <input type="hidden" name="location_id" id="location_id" class="form-control location_id" value="{{$location->id}}">
                <td>
                    {{ $location->show_name }}
                </td>
                <td>
                    <select class="form-control" name="compliant" id="compliant"
                     onchange="updateCompliant('{{ $location->id }}', this)">
                    <option value="{{ App\Models\ClauseData::COMPLIANT_ALL }}">Select Compliant</option>
                    <option value="{{ App\Models\ClauseData::COMPLIANT_YES }}">Yes</option>
                    <option value="{{ App\Models\ClauseData::COMPLIANT_NO }}">No</option>
                    <option value="{{ App\Models\ClauseData::COMPLIANT_UNDER_PROCESS }}">Under Process</option>
                </select>
            </td>
            <td>
                <input type="text" name="comment" id="comment" class="form-control" onfocusout="updateComment('{{ $location->id }}', this)">
            </td>
            <td>
                    <select class="form-control attachment" name="attachment" id="attachment" onchange="updateAttachment('{{ $location->id }}', this)">
                         <option value="0">Select Attachment</option>
                        @foreach (attachments() as $attachment)
                        <option value="{{ $attachment->id }}">
                            {{ $attachment->title }}
                        </option>
                        @endforeach
                    </select>
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
