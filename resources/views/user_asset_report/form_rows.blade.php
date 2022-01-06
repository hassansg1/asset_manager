@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->user_id }}</td>
        <td>
            @if($item->parent == "asset")
                {{ $item->user_id_assets->rec_id }}
            @elseif($item->parent == "system")
                {{ $item->user_id_systems->name }}
            @endif
        </td>
        <td>{{ $item->user_rights_id->rights_name->name }}</td>
    </tr>
@endforeach
