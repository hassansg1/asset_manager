@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->hardware_make }}</td>
        <td>{{ $item->hardware_model }}</td>
        <td>{{ $item->part_number }}</td>
        <td>
            @if($item->status == 1)
                Active
            @elseif($item->status == 2)
                End of sale
            @elseif($item->status == 3)
                End of service / support
            @else

            @endif
        </td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
