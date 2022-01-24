@foreach($items as $item)
    <tr id="{{ $item->id }}">
        <td>{{ $item->software->name ?? '' }}</td>
        <td>{{ $item->patch->software->name ?? '' }} {{ $item->patch->name ?? '' }}</td>
    </tr>
@endforeach
