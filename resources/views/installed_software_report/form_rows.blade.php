@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @foreach($selectedColumns as $selectedColumn)
            @if($selectedColumn == "software_name")
                <td>{{ $item->software->name ?? '' }}</td>
            @elseif($selectedColumn == "software_version")
                <td>{{ $item->software->version ?? '' }}</td>
            @elseif($selectedColumn == "software_description")
                <td>{{ $item->software->description ?? '' }}</td>
            @elseif($selectedColumn == "software_approval_required")
                <td>{{ $item->software->approval_required == 1 ? 'Yes' : '' }}</td>
            @elseif($selectedColumn == "software_function")
                <td>{{ $item->software->function ?? '' }}</td>
            @elseif($selectedColumn == "asset_id")
                <td>{{ $item->asset->rec_id ?? '' }}</td>
            @elseif($selectedColumn == "vendor_name")
                <td>{{ $item->software->vendor->name ?? '' }}</td>
            @elseif($selectedColumn == "profile")
                <td>{{ $item->software->vendor->profile ?? '' }}</td>
            @elseif($selectedColumn == "contact")
                <td>{{ $item->software->vendor->contact ?? '' }}</td>
            @else
                <td>{{ $item->{$selectedColumn} }}</td>
            @endif
        @endforeach
    </tr>
@endforeach
