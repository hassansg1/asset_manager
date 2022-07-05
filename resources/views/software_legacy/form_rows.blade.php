@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"
                               id="select_check_{{ $item->id }}" class="select_row"></td>
        <td>{{ $item->software_name }}</td>
        <td>{{ $item->software_version }}</td>
        <td>
            @if($item->software_type == 1)
                Application
            @elseif($item->software_type == 2)
                Operating System
            @else
            @endif
        </td>
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
