<option value="">Select IP Address</option>
@for($i = 0; $i<= $difference ; $i++)
    <option value="{{ $data->id }}">{{$data->start_ip}}</option>
@endfor
{{--@foreach($data as $entity)--}}
{{--    <option value="{{ $entity->id }}">{{$entity->start_ip}} - {{$entity->end_ip}}</option>--}}
{{--@endforeach--}}
