@foreach($items as $item)
    <tr id="{{ $item->id }}">
        {{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
        <td>{{ $item->process }}</td>
        <td>
            @if($item->criticality == 1)
                High
            @elseif($item->criticality == 2)
            Medium
            @else
            Low
            @endif
        </td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
