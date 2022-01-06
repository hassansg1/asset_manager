@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
        <td>{{ $item->asset->rec_id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->zone_source->name }}</td>
        <td>{{ $item->zone_destination->name }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
