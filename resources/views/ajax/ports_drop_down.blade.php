<option value="">Select Port</option>
@foreach($ports as $entity)
    <option value="{{ $entity->network_id }}">{{$entity->name}}</option>
@endforeach
