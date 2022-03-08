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
            <td>{{ $item->version->name }}</td>
            <td>{{ $item->clause->title }}</td>
            <td>{{ $item->comment}}</td>
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

