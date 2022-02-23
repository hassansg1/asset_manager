@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->number }}</td>
        <td>{{ $item->location->name }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->ip_address }}</td>
        <td>{{ $item->mac_address }}</td>
        <td>{{ $item->network->name }}</td>
        <td>{{ $item->connectedPort->name ?? '' }}</td>
    </tr>
@endforeach
