@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
        <td>{{ $item->risk_number }}</td>
        <td>{{ $item->risk_zone }}</td>
        <td>{{ $item->threat_source }}</td>
        <td>{{ $item->threat_action }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
