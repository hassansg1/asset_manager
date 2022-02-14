@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
        @if($item->system_type)
            <td>{{ $item->system_type->name }}</td>
        @else
            <td></td>
        @endif
        <td>{{ $item->name }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
