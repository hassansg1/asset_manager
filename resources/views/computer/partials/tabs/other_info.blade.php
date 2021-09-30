<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}client_description"
                   class="form-label">Asset Description(By Client)</label>
            <input type="text" value="{{ isset($item) ? $item->name:old('client_description') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}client_description"
                   name="client_description">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}vm_host"
                   class="form-label">VM Host</label>
            <input type="text" value="{{ isset($item) ? $item->name:old('vm_host') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}vm_host"
                   name="vm_host">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}operating_system" class="form-label">Operating System</label>
            <select class="form-select form-select-input" name="operating_system"
                    id="{{ isset($item) ? $item->id:'' }}operating_system">
                <option value=""></option>
                @foreach(\App\Models\OperatingSystem::all() as $var)
                    <option
                        {{ $var->id == (isset($item) ? $item->function:old('operating_system') ?? '') ? 'selected' : ''  }}
                        value="{{ $var->id }}">{{ $var->operating_system }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}connected_scada_server" class="form-label">Connected SCADA Server</label>
            <input type="text"
                   value="{{ isset($item) ? $item->connected_scada_server:old('connected_scada_server') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}connected_scada_server"
                   name="connected_scada_server">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}contact" class="form-label">Owner Contact</label>
            <input type="text"
                   value="{{ isset($item) ? $item->contact:old('contact') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}contact"
                   name="contact">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}source_file" class="form-label">Source File</label>
            <input type="text"
                   value="{{ isset($item) ? $item->source_file:old('source_file') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}source_file"
                   name="source_file">
        </div>
    </div>
</div>
