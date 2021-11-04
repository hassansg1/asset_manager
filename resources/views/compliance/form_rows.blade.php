@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->clause }}</td>
        <td>{{ $item->section }}</td>
        <td>
            <input type="radio" id="yes" name="applicable" value="yes">
            <label for="html">Yes</label><br>
            <input type="radio" id="no" name="applicable" value="no">
            <label for="css">No</label><br>
        </td>
        <td>
            <input type="text" class="form-control">
        </td>
        <td>
            <select class="form-control" name="compliant" id="">
                <option value="yes">Yes</option>
                <option value="no">No</option>
                <option value="under_process">Under Process</option>
            </select>
        </td>
        <td>
            <input type="file">
        </td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
