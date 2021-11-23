<tr id="{{ $item->id }}">
    <td style="padding-left: {{ $padding }}px">{{ $item->clause }}</td>
    <td>{{ $item->section }}</td>
    <td>
        <input type="checkbox" id="switch{{ $item->id }}" switch="bool" name="applicable{{ $item->id }}"
               {{ checkIdComplianceIsApplicable($item->id) ? 'checked' : '' }}
               onclick="complianceStatusChange({{ $item->id }},'applicable',$(this).is(':checked') == false ? 0 : 1);"
        />
        <label for="switch{{ $item->id }}" data-on-label="Yes"
               data-off-label="No"></label>
    </td>
    <td>
        <select class="form-control" name="criteria"
                onchange="complianceStatusChange({{ $item->id }},'criteria',this.value);">
            <option value="">Select Criteria</option>
            <option value="{{ App\Models\ComplianceData::AUTOMATIC }}">AUTOMATIC</option>
            <option value="{{ App\Models\ComplianceData::MANUAL }}">MANUAL</option>

        </select>
    </td>
    <td>
        <select class="form-control" name="location"
                onchange="complianceStatusChange({{ $item->id }},'location',$(this).val());">
            <option value="">Select Locations</option>
            <option value="{{ shortClassName(App\Models\Company::class) }}">Companies</option>
            <option value="{{ shortClassName(App\Models\Unit::class) }}">Units</option>
            <option value="{{ shortClassName(App\Models\Site::class) }}">Sites</option>
            <option value="{{ shortClassName(App\Models\SubSite::class) }}">Subsites</option>
            <option value="{{ shortClassName(App\Models\Building::class) }}">Buildings</option>
            <option value="{{ shortClassName(App\Models\Room::class) }}">Rooms</option>
            <option value="{{ shortClassName(App\Models\Cabinet::class) }}">Cabinets</option>
            <option value="{{ shortClassName(App\Models\Computer::class) }}">Computer Assets</option>
            <option value="{{ shortClassName(App\Models\NetworkAsset::class) }}">Network Assets</option>
            <option value="{{ shortClassName(App\Models\LoneAsset::class) }}">L01 Assets</option>
        </select>
    </td>
    <td>
        <input type="text" class="form-control" name="reason"
               onblur="complianceStatusChange({{ $item->id }},'reason',this.value);">
    </td>
</tr>
@php($childs = $item->childs)
@if(count($childs) > 0)
    @php($padding = $padding + 40)
    @foreach($childs as $child)
        @include('tree_files.compliance_table',['item' => $child,'padding' => $padding])
    @endforeach
@endif
