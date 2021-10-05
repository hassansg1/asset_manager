@php($rand = rand(10000,100000))
<tr data-id="1" id="{{ $rand }}">
    <td><input value="{{ isset($port) ? $port->name : '' }}" type="text" name="ports[name][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->number : '' }}" type="text" name="ports[number][]"
               class="form-control"></td>
    <td><input value="{{ isset($port) ? $port->type : '' }}" type="text" name="ports[type][]" class="form-control"></td>
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
    <td><input value="{{ isset($port) ? $port->speed : '' }}" type="text" name="ports[speed][]"
               class="form-control"></td>
    <td>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="ports[status][]" id="formRadios1"
                    {{ isset($port) && $port->status == 1 ? 'checked' : '' }}
            >
            <label class="form-check-label" for="formRadios1">
                Enabled
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="ports[status][]" id="formRadios2"
                   value="off"
                    {{ isset($port) && $port->status == 0 ? 'checked' : '' }}
            >
            <label class="form-check-label" for="formRadios2">
                Disabled
            </label>
        </div>
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