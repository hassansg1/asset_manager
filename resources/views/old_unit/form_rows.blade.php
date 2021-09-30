@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>
        <td>{{ $item->short_name }}</td>
        <td>{{ $item->long_name }}</td>
        <td>{{ $item->code }}</td>
        <td>{{ $item->contact_person }}</td>
        <td>{{ $item->ot_apn }}</td>
        <td>{{ universalDateFormatter($item->created_at) }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
