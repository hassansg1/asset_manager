<tr
    data-hierarchy="">
    <td>
        @for($value = 0;$value<$spaces;$value++)
            {!! '&nbsp;' !!}
        @endfor
        @php($rand = rand(100000000,1000000000))
        <input data-rand="{{ $rand }}"
               class="form-check-input location_check {{ $class }}" name="location[]"
               value="{{ $location->id }}"
               type="checkbox" id="formCheck">
        <label class="form-check-label" for="formCheck">
            {{ $location->show_name  }}
        </label>
    </td>
    @foreach (getAllPossibleChildTablesOfParent() as $objType)
        <td>
            <input data-rand="{{ $rand }}" data-type="View{{$objType}}"
                   class="View{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}"
                   name="permissions[{{ $objType }}][{{ $location->id }}]"
                   type="checkbox"
                   value="view"
            >
            <label class="form-check-label">View</label>

            <input data-rand="{{ $rand }}" data-type="Create{{$objType}}"
                   class="Create{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}"
                   name="permissions[{{ $objType }}][{{ $location->id }}]"
                   type="checkbox" value="create">
            <label class="form-check-label">Create</label>

            <input data-rand="{{ $rand }}" data-type="Edit{{$objType}}"
                   class="Edit{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}"
                   name="permissions[{{ $objType }}][{{ $location->id }}]"
                   type="checkbox" value="edit">
            <label class="form-check-label">Edit</label>

            <input data-rand="{{ $rand }}" data-type="Delete{{$objType}}"
                   class="Delete{{$objType}} form-check-input permission_check {{ $rand }}  {{ $class }}"
                   name="permissions[{{ $objType }}][{{ $location->id }}]"
                   type="checkbox" value="delete">
            <label class="form-check-label">Delete</label>
        </td>
    @endforeach
</tr>
