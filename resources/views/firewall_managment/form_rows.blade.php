@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
        <td>{{ $item->source_zone }}</td>
        <td>{{ $item->destination_zone }}</td>
        <td>{{ $item->source_location }}</td>
        <td>{{ $item->destination_location }}</td>
        <td>{{ $item->status }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
