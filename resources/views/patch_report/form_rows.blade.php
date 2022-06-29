@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @foreach($selectedColumns as $selectedColumn)
            @if($selectedColumn == "is_required")
                <td>{{ $item->{$selectedColumn} == 1 ? 'Yes' : 'No' }}</td>
            @elseif($selectedColumn == "is_critical")
                <td>{{ $item->{$selectedColumn} == 1 ? 'Yes' : 'No' }}</td>
            @elseif($selectedColumn == "vendor_name")
                <td>{{ $item->software->vendor->name ?? '' }}</td>
            @elseif($selectedColumn == "profile")
                <td>{{ $item->software->vendor->profile ?? '' }}</td>
            @elseif($selectedColumn == "contact")
                <td>{{ $item->vendor->contact ?? '' }}</td>
            @elseif($selectedColumn == "software_name")
                <td>{{ $item->software->name ?? '' }}</td>
            @elseif($selectedColumn == "software_version")
                <td>{{ $item->software->version ?? '' }}</td>
            @elseif($selectedColumn == "software_description")
                <td>{{ $item->software->description ?? '' }}</td>
            @else
                <td>{{ $item->{$selectedColumn} }}</td>
            @endif
        @endforeach
    </tr>
@endforeach
