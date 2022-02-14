@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->name }}</td>
        <td>{{ $item->designation_id }}</td>
        <td>{{ $item->department_id }}</td>
        <td>
            @include('components.edit_delete_button')
        </td>
    </tr>
@endforeach
