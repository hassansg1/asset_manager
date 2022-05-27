@foreach($items as $item)
    <tr id="{{ $item->id }}">
        @foreach($selectedColumns as $selectedColumn)
            @if($selectedColumn == "risk_assesment_id")
                <td>{{ $item->risk_assessment->risk_assesment_id }}</td>
            @elseif($selectedColumn == "risk_assesment_title")
                <td>{{ $item->risk_assessment->title }}</td>
            @elseif($selectedColumn == "risk_assesment_description")
                <td>{{ $item->risk_assessment->description }}</td>
            @elseif($selectedColumn == "risk_assesment_date")
                <td>{{ $item->risk_assessment->date_of_assesment }}</td>
            @elseif($selectedColumn == "participants")
                <td>{{ $item->risk_assessment->participant }}</td>
            @elseif($selectedColumn == "reason_of_assessment")
                <td>{{ $item->risk_assessment->reason_of_assesment }}</td>
            @else
                <td>{{ $item->{$selectedColumn} ?? '' }}</td>
            @endif
        @endforeach
    </tr>
@endforeach
