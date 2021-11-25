@php
    $clauseData = getClauseData($item->id);
@endphp
<tr id="{{ $item->id }}">
    <td style="padding-left: {{ $padding }}px">{{ $item->number }}</td>
    <td>{{ $item->title }}</td>
    <td>
        <input type="checkbox" id="switch{{ $item->id }}" switch="bool" name="applicable{{ $item->id }}"
               {{ isset($clauseData) && $clauseData && $clauseData->applicable == 1 ? 'checked' : '' }}
               onclick="applicableClauseStatusChange({{ $item->id }},'applicable',$(this).is(':checked') == false ? 0 : 1);"
        />
        <label for="switch{{ $item->id }}" data-on-label="Yes"
               data-off-label="No"></label>
    </td>
    <td>
        <select class="form-control" name="criteria"
                onchange="applicableClauseStatusChange({{ $item->id }},'criteria',this.value);">
            <option value="">Select Criteria</option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->criteria == App\Models\ClauseData::AUTOMATIC ? 'selected' : '' }}
                value="{{ App\Models\ClauseData::AUTOMATIC }}">AUTOMATIC
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->criteria == App\Models\ClauseData::MANUAL ? 'selected' : '' }}
                value="{{ App\Models\ClauseData::MANUAL }}">MANUAL
            </option>

        </select>
    </td>
    <td>
        <select class="form-control" name="location"
                onchange="applicableClauseStatusChange({{ $item->id }},'location',$(this).val());">
            <option value="">Select Locations</option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\Company::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\Company::class) }}">
                Companies
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\Unit::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\Unit::class) }}">
                Units
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\Site::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\Site::class) }}">
                Sites
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\SubSite::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\SubSite::class) }}">
                Subsites
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\Building::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\Building::class) }}">
                Buildings
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\Room::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\Room::class) }}">
                Rooms
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\Cabinet::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\Cabinet::class) }}">
                Cabinets
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\Computer::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\Computer::class) }}">
                Computer Assets
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\NetworkAsset::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\NetworkAsset::class) }}">
                Network Assets
            </option>
            <option
                {{ isset($clauseData) && $clauseData && $clauseData->location == shortClassName(App\Models\LoneAsset::class) ? 'selected' : '' }}
                value="{{ shortClassName(App\Models\LoneAsset::class) }}">
                L01 Assets
            </option>
        </select>
    </td>
    <td>
        <input type="text" class="form-control" name="reason"
               value="{{ $clauseData->reason ?? '' }}"
               onblur="applicableClauseStatusChange({{ $item->id }},'reason',this.value);">
    </td>
</tr>
@php($childs = $item->childs)
@if(count($childs) > 0)
    @php($padding = $padding + 40)
    @foreach($childs as $child)
        @include('tree_files.applicable_clause_table',['item' => $child,'padding' => $padding])
    @endforeach
@endif
