@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @foreach($selectedColumns as $selectedColumn)
            @if($selectedColumn == "approval_required")
                <td>{{ $item->{$selectedColumn} == 1 ? 'Yes' : 'No' }}</td>
            @elseif($selectedColumn == "vendor_name")
                <td>{{ $item->vendor->name ?? '' }}</td>
            @elseif($selectedColumn == "profile")
                <td>{{ $item->vendor->profile ?? '' }}</td>
            @elseif($selectedColumn == "contact")
                <td>{{ $item->vendor->contact ?? '' }}</td>
            @else
                <td>{{ $item->{$selectedColumn} }}</td>
            @endif
        @endforeach
    </tr>
@endforeach
