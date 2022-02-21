<option value="">Select IP Address</option>
@for($i = $start_ip; $i<= $end_ip ; $i++)
    <option value="{{ $data->id }}">{{$startingAddress}}.{{$i}}</option>
@endfor
{{--@foreach($data as $entity)--}}
{{--    <option value="{{ $entity->id }}">{{$entity->start_ip}} - {{$entity->end_ip}}</option>--}}
{{--@endforeach--}}
