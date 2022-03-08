@foreach($items as $item)
        <tr id="{{ $item->id }}">
            <td>{{ $item->name }}</td>
            <td><a href="{{url($route."/".$item->id."/1")}}">{{getComplaintCount($item->id)}} - Complaint</a></td>
            <td><a href="{{url($route."/".$item->id."/2")}}">{{getNonComplaintCount($item->id)}} - NonComplaint</a></td>
            <td><a href="{{url($route."/".$item->id."/3")}}">{{getUnderProcessComplaintCount($item->id)}} - UnderProcess</a></td>
            <td><a href="{{url($route."/".$item->id."/4")}}">{{NotEvaluated($item->id)}} - Not Evaluated</a></td>
        </tr>
@endforeach

