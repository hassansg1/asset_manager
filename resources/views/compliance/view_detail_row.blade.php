<tr id="{{ $items->id }}">
    <td colspan="1"><input type="checkbox" name="select_row" value="{{ $items->id }}"
                           id="select_check_{{ $items->id }}" class="select_row"></td>
    <td>{{ $items->compliance->clause }}</td>
    <td>{{ $items->compliance->section }}</td>
    <td>
        <select class="form-control select2 complianceDatalocation" multiple="multiple" name="location" onchange="complianceAddLocation({{ $items->id }});">
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


</tr>






