<select class="form-control select2" name="parent_id"
        id="{{ isset($item) ? $item->id:'' }}short_name" required>
    <option value="">Search by Name</option>
    @foreach(getLocationsForDropDown($type,isset($item)?'edit':'create',$model ?? null) as $heading => $locations)
        <optgroup label={{ \App\Models\Location::getTypeToModel($heading) }}>
            @foreach($locations as $location)
                <option
                    {{ isset($item) && $item->parent_id == $location->id ? 'selected' : '' }}
                    value="{{ $location->id }}">{{ $location->text }}</option>
            @endforeach
        </optgroup>
    @endforeach
</select>
