@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->software->name ?? '' }} {{ $item->software->version ?? '' }}</td>
        <td>{{ $item->name ?? '' }}</td>
        <td>{{ $item->description ?? '' }}</td>
        <td>{{ $item->release_date ?? '' }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
