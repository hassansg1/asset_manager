@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->compliance_id }}"
                               id="select_check_{{ $item->compliance_id }}" class="select_row"></td>
        <td>{{ $item->compliance->clause ?? '' }}</td>
        <td>{{ $item->compliance->section ?? '' }}</td>
        <td>
{{--            <input type="radio" id="yes" name="applicable" value="{{ App\Models\ComplianceData::APPLICABLE_YES }}" onclick="complianceStatusChange({{ $item->compliance_id }},'applicable',this.value);">--}}
            <label for="html">Yes</label><br>
{{--            <input type="radio" id="no" name="applicable" value="{{ App\Models\ComplianceData::APPLICABLE_NO }}" onclick="complianceStatusChange({{ $item->compliance_id }},'applicable',this.value);">--}}
{{--            <label for="css">No</label><br>--}}
        </td>
        <td>
            <input type="text" class="form-control" name="description" value="{{$item->description}}" onblur="complianceStatusChange({{ $item->compliance_id }},'description',this.value);">
        </td>
        <td>
            <select class="form-control" name="compliant" onclick="complianceStatusChange({{ $item->compliance_id }},'compliant',this.value);">
                <option value="{{ App\Models\ComplianceData::COMPLIANT_ALL }}">Select Compliant</option>
                <option value="{{ App\Models\ComplianceData::COMPLIANT_YES }}">Yes</option>
                <option value="{{ App\Models\ComplianceData::COMPLIANT_NO }}">No</option>
                <option value="{{ App\Models\ComplianceData::COMPLIANT_UNDEP_ROCESS }}">Under Process</option>
            </select>
        </td>
        <td>
            <a href="#" data-bs-toggle="modal" data-bs-target=".image-upload-modal-{{ $item->compliance_id }}">
                <i class="fa fa-file-image" aria-hidden="true"></i>
            </a>
        </td>
{{--        <td>--}}
{{--            @include('components.edit_delete_button')--}}
{{--        </td>--}}
    </tr>

     </div><!-- /.modal -->
@endforeach

