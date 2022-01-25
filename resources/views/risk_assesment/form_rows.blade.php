@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}" id="select_check_{{ $item->id }}" class= "select_row"></td>--}}
        <td>{{ $item->risk_assesment_id }}</td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->date_of_assesment }}</td>
        <td>{{ $item->description }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
