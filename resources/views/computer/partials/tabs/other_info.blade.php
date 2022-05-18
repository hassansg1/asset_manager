<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}vm_host"
                   class="form-label">VM Host</label>
            <input type="text" value="{{ isset($item) ? $item->vm_host:old('vm_host') ?? ''  }}"
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
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}connected_scada_server" class="form-label">Connected SCADA Server</label>
            <input type="text"
                   value="{{ isset($item) ? $item->connected_scada_server:old('connected_scada_server') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}connected_scada_server"
                   name="connected_scada_server">
        </div>
    </div>
</div>
<div class="row">
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
            <label for="{{ isset($item) ? $item->id:'' }}hardware_legacy" class="form-label">Hardware Legacy</label>
            <select class="form-control select2" id="hardware_legacy" name="hardware_legacy">
                <option value="">-Select Hardware Legacy-</option>
                <option value="1" {{ isset($item) && $item->hardware_legacy == 1  ? 'selected' : ''}}>Active</option>
                <option value="2" {{ isset($item)  && $item->hardware_legacy == 2  ? 'selected' : ''}}>Obsolete</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}software_legacy" class="form-label">Software Legacy</label>
            <select class="form-control select2" id="hardware_legacy" name="hardware_legacy">
                <option value="">-Select Software Legacy-</option>
                <option value="1" {{ isset($item) && $item->hardware_legacy == 1  ? 'selected' : ''}}>Active</option>
                <option value="2" {{ isset($item)  && $item->hardware_legacy == 2  ? 'selected' : ''}}>Obsolete</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}single_point_of_failure" class="form-label">Single Point of Failure</label>
            <select class="form-select select2" name="single_point_of_failure"
                    id="{{ isset($item) ? $item->id:'' }}single_point_of_failure">
                <option value="">-Select Point of Failure-</option>
                <option value="1" {{ isset($item) && $item->single_point_of_failure == 1  ? 'selected' : ''}}>Yes</option>
                <option value="2" {{ isset($item)  && $item->single_point_of_failure == 2  ? 'selected' : ''}}>No</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}criticality" class="form-label">Criticality</label>
            <select class="form-control select2" id="criticality" name="criticality">
                <option value="">-Select Policy Validity-</option>
                <option value="1" {{ isset($item) && $item->criticality == 1  ? 'selected' : ''}}>High</option>
                <option value="2" {{ isset($item)  && $item->criticality == 2  ? 'selected' : ''}}>Medium</option>
                <option value="3" {{ isset($item)  && $item->criticality == 3  ? 'selected' : ''}}>Low</option>
            </select>
        </div>
    </div>
</div>
