@foreach($items as $item)
    <tr id="{{ $item->location_id }}">
        <td>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $item->location_id  }}" aria-expanded="true"
                                aria-controls="collapseOne">
                            <strong>
                                @if($item->location)
                                {{ $item->location->name }}
                                @endif
                            </strong>
                        </button>
                    </h2>
                    <div id="collapse{{ $item->location_id  }}" class="accordion-collapse collapse show"
                         aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Port Number</th>
                                    <th>Port Name</th>
                                    <th>Port IP Address</th>
                                    <th>Port Mac Address</th>
                                    <th>Port Netwrok</th>
                                    <th>Connected Port</th>
                                    <th>Connected Port Device</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(getDevicePorts($item->location_id) as $port)
                                    <tr>
                                        <td>{{$port->number}}</td>
                                        <td>{{$port->name}}</td>
                                        <td>{{$port->ip_address}}</td>
                                        <td>{{$port->mac_address}}</td>
                                        <td>
                                            @if($port->network)
                                            <a href="{{ route("networks.show",$port->network->id) }}" target="_blank">{{$port->network->name}}</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($port->connectedPort)
                                            {{$port->connectedPort->name ?? ''}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($port->connectedPort)
                                                <a href="{{ route($port->connectedPort->location->type.".show",$port->connectedPort->location->id ?? '') }}" target="_blank">{{$port->connectedPort->location->name ?? ''}}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
        </td>
        {{--        <td>{{ $item->name }}</td>--}}
        {{--        <td>{{ $item->ip_address }}</td>--}}
        {{--        <td>{{ $item->mac_address }}</td>--}}
        {{--        <td>{{ $item->network->name }}</td>--}}
        {{--        <td>{{ $item->connectedPort->name ?? '' }}</td>--}}
    </tr>
@endforeach
