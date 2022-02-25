<div class="table-responsive">
    <table class="table mb-0" id="location_table">

        <thead class="table-light">
        <tr>
            <th>Location Name</th>
            <th>Compliant</th>
            <th>Comment</th>
            <th>Attachment ID</th>
            <th>Attachment Url</th>
        </tr>
        </thead>
        <tbody>
        <input type="hidden" name="item" id="item" class="form-control" value="{{$item_id}}">
        @foreach($locations as $location)
            @php
                $dt = getComplianceStatus($versionId,$item_id,$location->id)
            @endphp
            <tr class="parent_row">
                <input type="hidden" name="location_id" id="location_id" class="form-control location_id"
                       value="{{$location->id}}">
                <td>
                    {{ $location->show_name }}
                </td>
                <td>
                    <select class="form-control" name="compliant" id="compliant"
                            onchange="updateCompliant('{{ $location->id }}', this)">
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_ALL ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_ALL }}">
                            Select Compliant
                        </option>
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_YES ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_YES }}">
                            Yes
                        </option>
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_NO ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_NO }}">
                            No
                        </option>
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_UNDER_PROCESS ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_UNDER_PROCESS }}">
                            Under Process
                        </option>
                        <option
                            {{ isset($dt) && $dt->compliant == App\Models\ClauseData::COMPLIANT_NOT_EVALUATED ? 'selected' : '' }} value="{{ App\Models\ClauseData::COMPLIANT_NOT_EVALUATED }}">
                            Not Evaluated
                        </option>
                    </select>
                </td>
                <td>
                    <textarea onfocusout="updateComment('{{ $location->id }}', this)" class="form-control"
                              name="comment" id="comment" cols="30" rows="10">{{ $dt->comment ?? '' }}</textarea>
                </td>
                <td>
                    <select class="form-control" name="attachment_id" id="attachment_id"
                            onchange="updateComplianceVersionItemsAttachmentId('{{ $location->id }}', this)" multiple>
                        <option value="">-Select Document-</option>
                        @foreach($attachments as $attachment)
                            <option value="{{$attachment->id}}">
                                {{$attachment->title}}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input value="{{ $dt->link ?? '' }}" type="text" name="link" id="comment" class="form-control"
                           onfocusout="updateLink('{{ $location->id }}', this)">
                </td>
            </tr>
            <div class="modal fade image-upload-modal-{{ $location->id }}" tabindex="-1" role="dialog"
                 aria-hidden="true">
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
                                                <input name="file" type="file" multiple="multiple"
                                                       style="visibility: hidden;">
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
                                        <button type="button" class="btn btn-primary waves-effect waves-light">Send
                                            Files
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
