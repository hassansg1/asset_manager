@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>
            @if($item->user_unit)
                {{ $item->user_unit->short_name }}
            @endif
        </td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->designation_id }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
