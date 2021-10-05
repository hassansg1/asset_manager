@php($rows = isset($port->rows)?$port->rows:'1')
@for($i = 0; $i < $rows ; $i ++)
@php($rand = rand(10000,100000))
<tr data-id="1" id="{{ $rand }}">
    <td><input value="{{ isset($port) ? $port->nic : '' }}" type="text" name="ports[nic][]" class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->number : '' }}" type="text" name="ports[number][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->mac_address : '' }}" type="text" name="ports[mac_address][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->ip_address : '' }}" type="text" name="ports[ip_address][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->sub_net_mask : '' }}" type="text" name="ports[sub_net_mask][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->default_gateway : '' }}" type="text" name="ports[default_gateway][]"
               class="form-control"></td>
    @php($rand = rand(100000,1000000))
    <td>
        <select onchange="loadPorts(this,'{{ $rand }}')" name="" id="" class="form-control">
            <option value="">Select Network</option>
            @foreach(\App\Models\NetworkAsset::all() as $entity)
                <option
                        {{ isset($port) && $port->connected_port_id && \App\Models\Port::find($port->connected_port_id)->portable_id == $entity->id ? 'selected' : '' }}
                        value="{{ $entity->id }}">{{$entity->name}}</option>
            @endforeach
        </select>
        <select name="ports[connected_port_id][]" id="" class="form-control mt-3 {{ $rand }}">
            <option value="">Select Port</option>
            @if(isset($port) && $port->connected_port_id && \App\Models\Port::find($port->connected_port_id)->portable_id)
                @foreach(\App\Models\Port::where('portable_id',\App\Models\Port::find($port->connected_port_id)->portable_id)->get() as $entity)
                    <option
                            {{ isset($port) && $port->connected_port_id == $entity->id ? 'selected' : '' }}
                            value="{{ $entity->id }}">{{$entity->name}}</option>
                @endforeach
            @endif
        </select>
    </td>
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
@endfor
