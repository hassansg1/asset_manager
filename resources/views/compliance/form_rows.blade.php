@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->clause }}</td>
        <td>{{ $item->section }}</td>
        <td>
            <input type="radio" id="yes" name="applicable" value="{{ App\Models\ComplianceData::APPLICABLE_YES }}" onclick="complianceStatusChange({{ $item->id }},'applicable',this.value);">
            <label for="html">Yes</label><br>
            <input type="radio" id="no" name="applicable" value="{{ App\Models\ComplianceData::APPLICABLE_NO }}" onclick="complianceStatusChange({{ $item->id }},'applicable',this.value);">
            <label for="css">No</label><br>
        </td>
        <td>
            <select class="form-control" name="criteria" onclick="complianceStatusChange({{ $item->id }},'criteria',this.value);">
                <option value="">Select Criteria</option>
                <option value="{{ App\Models\ComplianceData::AUTOMATIC }}">AUTOMATIC</option>
                <option value="{{ App\Models\ComplianceData::MANUAL }}">MANUAL</option>

            </select>
        </td>
        <td>
            <select class="form-control" name="location" onclick="complianceStatusChange({{ $item->id }},'location',this.value);">
                <option value="">Select Locations</option>
                <option value="{{ App\Models\ComplianceData::COMPANIES }}">COMPANIES</option>
                <option value="{{ App\Models\ComplianceData::UNITS }}">UNITS</option>
                <option value="{{ App\Models\ComplianceData::SITES }}">SITES</option>
                <option value="{{ App\Models\ComplianceData::SUBSITES }}">SUBSITES</option>
                <option value="{{ App\Models\ComplianceData::BUILDINGS }}">BUILDINGS</option>
                <option value="{{ App\Models\ComplianceData::ROOMS }}">ROOMS</option>
                <option value="{{ App\Models\ComplianceData::CABINETS }}">CABINETS</option>
                <option value="{{ App\Models\ComplianceData::ASSETS }}">ASSETS</option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="reason" onblur="complianceStatusChange({{ $item->id }},'reason',this.value);">
        </td>
        {{-- <td>
            <select class="form-control" name="compliant" onclick="complianceStatusChange({{ $item->id }},'compliant',this.value);">
                <option value="{{ App\Models\ComplianceData::COMPLIANT_ALL }}">Select Compliant</option>
                <option value="{{ App\Models\ComplianceData::COMPLIANT_YES }}">Yes</option>
                <option value="{{ App\Models\ComplianceData::COMPLIANT_NO }}">No</option>
                <option value="{{ App\Models\ComplianceData::COMPLIANT_UNDEP_ROCESS }}">Under Process</option>
            </select>
        </td> --}}
       {{--  <td>
            <a href="#" data-bs-toggle="modal" data-bs-target=".image-upload-modal-{{ $item->id }}">
               <i class="fa fa-file-image" aria-hidden="true"></i>
            </a>
        </td> --}}
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>


{{-- <div class="modal fade image-upload-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <form action="#" method="post" class="dropzone" id="file_upload_form" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden" name="compliance_id" value="{{ $item->id }}">
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple" style="visibility: hidden;">
                                </div>

                            </form>
                        </div>

                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Send Attachment</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div> --}}

@endforeach
