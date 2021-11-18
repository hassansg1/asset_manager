@foreach($items as $key => $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ ++$key }}</td>
        <td>{{ $item->documentNumber }}</td>
        <td>{{ $item->version }}</td>
        <td>{{ $item->date }}</td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ $item->subCategory }}</td>
        <td>{{ count($item->attachmentItems) }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
