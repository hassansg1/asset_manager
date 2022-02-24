@foreach($items as $item)
    @if ($item->ip_address)
    <tr id="{{ $item->id }}">
        <td>{{ $item->ip_address }}</td>
{{--        <td>{{ $item->number }}</td>--}}
        <td>
            @if($item->location_id)
                <a href="{{ route($item->location->type.".show",$item->location->id ?? '') }}" target="_blank">{{$item->location->name ?? ''}}</a>
            @endif
        </td>
{{--        <td>{{ $item->name }}</td>--}}
{{--        <td>{{ $item->ip_address }}</td>--}}
{{--        <td>{{ $item->mac_address }}</td>--}}
        <td><a href="{{ route("networks.show",$item->network->id) }}" target="_blank">{{$item->network->name}}</a></td>
{{--        <td>{{ $item->connectedPort->name ?? '' }}</td>--}}
    </tr>
    @endif
@endforeach

