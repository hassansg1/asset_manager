    <select class="form-control select2 complianceDatalocationss" multiple="multiple" name="location">
        <option value="">Select Locations</option>
        @foreach($locations as $location)
            <option value="{{ $location->id }}">{{ $location->show_name }}</option>
        @endforeach
    </select>
