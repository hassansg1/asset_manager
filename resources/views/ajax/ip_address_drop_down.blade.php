<option value="">Select IP Address</option>
@foreach($data as $entity)
    <option value="{{ $entity->id }}">{{$entity->start_ip}} - {{$entity->end_ip}}</option>
@endforeach
