<option value="">Select Port</option>
@foreach($ports as $entity)
    <option value="{{ $entity->id }}">{{$entity->name}}</option>
@endforeach
