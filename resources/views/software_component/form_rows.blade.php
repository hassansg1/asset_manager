@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->software->name ?? '' }}</td>
        <td>{{ $item->version }}</td>
        <td>{{ $item->description }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
