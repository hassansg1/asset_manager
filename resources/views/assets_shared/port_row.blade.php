@php($rand = rand(10000,100000))
<tr data-id="1" id="{{ $rand }}">
    <td><input value="{{ isset($port) ? $port->ip_address : '' }}" type="text" name="ports[ip_address][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->mac_address : '' }}" type="text" name="ports[mac_address][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->nic : '' }}" type="text" name="ports[nic][]" class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->default_gateway : '' }}" type="text" name="ports[default_gateway][]"
               class="form-control"></td>
    @if(isset($network) && $network == 'true')
        <td>
            <select name="ports[network][]" id="" class="form-control">
                <option value="">Select Network</option>
                @foreach(\App\Models\Networks::all() as $network)
                    <option
                            {{ isset($port) && $port->network_id == $network->id ? 'selected' : '' }}
                            value="{{ $network->id }}">{{ $network->name }}</option>
                @endforeach
            </select>
        </td>
    @else
        <td>
            <select name="ports[connected_port_id][]" id="" class="form-control">
                <option value="">Select Port</option>
                @foreach(\App\Models\Port::where('network_id','!=','')->get() as $entity)
                    <option
                            {{ isset($port) && $port->connected_port_id == $entity->id ? 'selected' : '' }}
                            value="{{ $entity->id }}">{{$entity->network->name}}-{{ $entity->ip_address }}</option>
                @endforeach
            </select>
        </td>
    @endif
    <td><input value="{{ isset($port) ? $port->sub_net_mask : '' }}" type="text" name="ports[sub_net_mask][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->dhcp_server : '' }}" type="text" name="ports[dhcp_server][]"
               class="form-control"></td>
    <td style="width: 100px">
        <a onclick="deletePortRow('{{ $rand }}');"
           class="btn btn-outline-secondary btn-sm edit" title="Edit">
            <i class="fas fa-trash-alt"></i>
        </a>
        <a style="display: none;"
           class="table-editable-edit-button btn btn-outline-secondary btn-sm edit" title="Edit">
            <i class="fas fa-trash-alt"></i>
        </a>
    </td>
</tr>