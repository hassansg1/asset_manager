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
            <select class="form-select form-select-input" name="hardware_legacy"
                    id="{{ isset($item) ? $item->id:'' }}hardware_legacy">
                <option value=""></option>
                @foreach(hardwareLegacy() as $key => $var)
                    <option
                        {{ $key == (isset($item) ? $item->hardware_legacy:old('hardware_legacy') ?? '') ? 'selected' : ''  }}
                        value="{{ $key }}">{{ $var }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}software_legacy" class="form-label">Software Legacy</label>
            <select class="form-select form-select-input" name="software_legacy"
                    id="{{ isset($item) ? $item->id:'' }}software_legacy">
                <option value=""></option>
                @foreach(softwareLegacy() as $key => $var)
                    <option
                        {{ $key == (isset($item) ? $item->software_legacy:old('software_legacy') ?? '') ? 'selected' : ''  }}
                        value="{{ $key }}">{{ $var }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}single_point_of_failure" class="form-label">Single Point of Failure</label>
            <select class="form-select form-select-input" name="single_point_of_failure"
                    id="{{ isset($item) ? $item->id:'' }}single_point_of_failure">
                <option value=""></option>
                @foreach(SinglePointofFailure() as $key => $var)
                    <option
                        {{ $key == (isset($item) ? $item->single_point_of_failure:old('single_point_of_failure') ?? '') ? 'selected' : ''  }}
                        value="{{ $key }}">{{ $var }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}criticality" class="form-label">Criticality</label>
            <select class="form-select form-select-input" name="criticality"
                    id="{{ isset($item) ? $item->id:'' }}criticality">
                <option value=""></option>
                @foreach(Criticality() as $key => $var)
                    <option
                        {{ $key == (isset($item) ? $item->criticality:old('criticality') ?? '') ? 'selected' : ''  }}
                        value="{{ $key }}">{{ $var }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
