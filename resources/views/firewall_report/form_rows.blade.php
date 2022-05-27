@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @foreach($selectedColumns as $selectedColumn)
            <td>{{ $item->{$selectedColumn} }}</td>
        @endforeach
    </tr>
@endforeach
