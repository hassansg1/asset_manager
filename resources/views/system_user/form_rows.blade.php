@foreach($items as $item)
    <tr id="{{ $item->id }}">
{{--        <td colspan="1"><input type="checkbox" name="select_row" value="{{ $item->id }}"--}}
{{--                               id="select_check_{{ $item->id }}" class="select_row"></td>--}}
        <td>{{ $item->system->name }}</td>
        <td>{{ $item->system_user_id }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
