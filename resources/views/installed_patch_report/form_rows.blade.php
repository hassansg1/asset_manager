@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @foreach($selectedColumns as $selectedColumn)
            @if($selectedColumn == "is_required")
                <td>{{ $item->{$selectedColumn} == 1 ? 'Yes' : 'No' }}</td>
            @elseif($selectedColumn == "is_critical")
                <td>{{ $item->{$selectedColumn} == 1 ? 'Yes' : 'No' }}</td>
            @elseif($selectedColumn == "asset_id")
                <td>{{ $item->asset->rec_id ?? '' }}</td>
            @elseif($selectedColumn == "vendor_name")
                <td>{{ $item->patch->software->vendor->name ?? '' }}</td>
            @elseif($selectedColumn == "profile")
                <td>{{ $item->patch->software->vendor->profile ?? '' }}</td>
            @elseif($selectedColumn == "contact")
                <td>{{ $item->patch->vendor->contact ?? '' }}</td>
            @elseif($selectedColumn == "software_name")
                <td>{{ $item->patch->software->name ?? '' }}</td>
            @elseif($selectedColumn == "software_version")
                <td>{{ $item->patch->software->version ?? '' }}</td>
            @elseif($selectedColumn == "software_description")
                <td>{{ $item->patch->software->description ?? '' }}</td>
            @elseif($selectedColumn == "patch_name")
                <td>{{ $item->patch->name ?? '' }}</td>
            @elseif($selectedColumn == "patch_description")
                <td>{{ $item->patch->description ?? '' }}</td>
            @elseif($selectedColumn == "patch_release_date")
                <td>{{ $item->patch->release_date ?? '' }}</td>
            @elseif($selectedColumn == "patch_is_required")
                <td>{{ $item->patch->is_required == 1 ? 'Yes' : '' }}</td>
            @elseif($selectedColumn == "patch_is_critical")
                <td>{{ $item->patch->is_critical == 1 ? 'Yes' : '' }}</td>
            @else
                <td>{{ $item->{$selectedColumn} }}</td>
            @endif
        @endforeach
    </tr>
@endforeach
