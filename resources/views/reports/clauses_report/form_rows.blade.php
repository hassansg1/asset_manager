@foreach($items as $item)
        <tr id="{{ $item->id }}">
            <td>{{ $item->name }}</td>
            <td><a href="{{url($route."/".$item->id."/1")}}">{{getComplaintCount($item->id)}}</a></td>
            <td><a href="{{url($route."/".$item->id."/2")}}">{{getNonComplaintCount($item->id)}}</a></td>
            <td><a href="{{url($route."/".$item->id."/3")}}">{{getUnderProcessComplaintCount($item->id)}} </a></td>
            <td><a href="{{url($route."/".$item->id."/4")}}">{{NotEvaluated($item->id)}}</a></td>
        </tr>
@endforeach

