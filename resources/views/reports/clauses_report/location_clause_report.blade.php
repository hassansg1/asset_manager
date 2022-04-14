@extends('components.datatable')
@section('table_header')
    <th>Compliance Version</th>
    <th>Clause</th>
    <th>Comment</th>
    <th>Complaint</th>
@endsection
@section('table_rows')
    @foreach($items as $item)
        <tr id="{{ $item->id }}">
            <td>@if($item->version){{ $item->version->name }}@endif</td>
            <td>@if($item->clause){{ $item->clause->title }}@endif</td>
            <td>{!!descriptionWrapText($item->comment,50)!!}</td>
            <td>
                @if($item->compliant == 1)
                    Yes
                @elseif($item->compliant == 2)
                    No
                @elseif($item->compliant == 3)
                    Under Process
                @elseif($item->compliant == 4)
                    Not Evaluated
                @endif
            </td>
        </tr>
    @endforeach
@endsection

