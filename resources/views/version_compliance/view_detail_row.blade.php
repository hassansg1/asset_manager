<tr id="{{ $items->id }}">
    <td colspan="1"><input type="checkbox" name="select_row" value="{{ $items->id }}"
                           id="select_check_{{ $items->id }}" class="select_row"></td>
    <td>{{ $items->compliance->clause }}</td>
    <td>{{ $items->compliance->section }}</td>
    <td>
        <select class="form-control select2 complianceDatalocation" name="location" onchange="complianceAddLocation({{ $items->id }});">
            <option value="">Select Locations</option>
            <option value="{{ App\Models\ClauseData::COMPANIES }}">COMPANIES</option>
            <option value="{{ App\Models\ClauseData::UNITS }}">UNITS</option>
            <option value="{{ App\Models\ClauseData::SITES }}">SITES</option>
            <option value="{{ App\Models\ClauseData::SUBSITES }}">SUBSITES</option>
            <option value="{{ App\Models\ClauseData::BUILDINGS }}">BUILDINGS</option>
            <option value="{{ App\Models\ClauseData::ROOMS }}">ROOMS</option>
            <option value="{{ App\Models\ClauseData::CABINETS }}">CABINETS</option>
            <option value="{{ App\Models\ClauseData::ASSETS }}">ASSETS</option>
        </select>
    </td>
    <td id="lll_{{ $items->id }}"></td>

</tr>






