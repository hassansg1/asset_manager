@foreach($items as $item)
    <tr id="{{ $item->id }}">
        {{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
        @if(checkIfAssetFunctionUsed($item->id))
        <td>{{ $item->name }}</td>
        @else
            <td style="font-weight: bold;">{{ $item->name }}</td>
        @endif

            <td>
                @include('components.edit_delete_button')
            </td>
    </tr>
@endforeach
