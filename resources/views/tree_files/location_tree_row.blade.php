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
               type="checkbox" id="{{ $location->id }}location">
        <label class="form-check-label" for="formCheck">
            {{ $location->show_name  }}
        </label>
    </td>
    @foreach (getAllPossibleChildTablesOfParent() as $objType)
        <td>
            <input data-rand="{{ $rand }}" data-type="View{{$objType}}"
                   class="View{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}"
                   name="permissions[{{ $objType }}][view][]"
                   type="checkbox"
                   id="{{ $location->id.$objType }}view"
                   value="{{ $location->id }}"
            >
            <label class="form-check-label">View</label>

            <input data-rand="{{ $rand }}" data-type="Create{{$objType}}"
                   class="{{ $location->id.$objType }}create Create{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}"
                   name="permissions[{{ $objType }}][create][]"
                   id="{{ $location->id.$objType }}create"
                   type="checkbox" value="{{ $location->id }}">
            <label class="form-check-label">Create</label>

            <input data-rand="{{ $rand }}" data-type="Edit{{$objType}}"
                   class="{{ $location->id.$objType }}edit Edit{{$objType}} form-check-input permission_check {{ $rand }} {{ $class }}"
                   name="permissions[{{ $objType }}][edit][]"
                   id="{{ $location->id.$objType }}edit"
                   type="checkbox" value="{{ $location->id }}">
            <label class="form-check-label">Edit</label>

            <input data-rand="{{ $rand }}" data-type="Delete{{$objType}}"
                   class="{{ $location->id.$objType }}delete Delete{{$objType}} form-check-input permission_check {{ $rand }}  {{ $class }}"
                   name="permissions[{{ $objType }}][delete][]"
                   id="{{ $location->id.$objType }}delete"
                   type="checkbox" value="{{ $location->id }}">
            <label class="form-check-label">Delete</label>
        </td>
    @endforeach
</tr>
