    Network : {{$data->name}}
@if($data->port)
    Port: {{$data->port->name}}
    Asset: {{$data->port->location->rec_id}}
@endif
