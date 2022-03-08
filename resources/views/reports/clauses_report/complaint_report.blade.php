@extends('components.datatable')
@section('table_header')
    <th>Location</th>
    <th>Complaint</th>
@endsection
@section('table_rows')
    @foreach($items as $item)
        <tr id="{{ $item->id }}">
            <td><a href="{{url("reports/location_clauses_report/".$item->location_id."/".$item->compliant)}}">{{ $item->location->long_name }}</a></td>
            <td>
                @if($item->compliant == 1)
                    {{ $compliance = App\Models\ComplianceVersionItem::where('location_id', $item->location_id)->where('compliant', $item->compliant)->count() }}
                @elseif($item->compliant == 2)
                    {{ $compliance = App\Models\ComplianceVersionItem::where('location_id', $item->location_id)->where('compliant', $item->compliant)->count() }}
                @elseif($item->compliant == 3)
                    {{ $compliance = App\Models\ComplianceVersionItem::where('location_id', $item->location_id)->where('compliant', $item->compliant)->count() }}
                @elseif($item->compliant == 4)
                    {{ $compliance = App\Models\ComplianceVersionItem::where('location_id', $item->location_id)->where('compliant', $item->compliant)->count() }}
                @endif
            </td>
        </tr>
    @endforeach
@endsection

