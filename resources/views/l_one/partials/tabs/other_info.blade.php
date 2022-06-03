<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}asset_firmware"
                   class="form-label">Asset Firmware</label>
            <input type="text" value="{{ isset($item) ? $item->asset_firmware:old('asset_firmware') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}asset_firmware"
                   name="asset_firmware">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}redundant_pair_id"
                   class="form-label">Redundant Asset Pair ID (If Applicable)</label>
            <input type="text" value="{{ isset($item) ? $item->redundant_pair_id:old('redundant_pair_id') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}redundant_pair_id"
                   name="redundant_pair_id">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}connected_scada_server" class="form-label">Connected SCADA
                Server</label>
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
            <label for="{{ isset($item) ? $item->id:'' }}owner_contact" class="form-label">Owner Contact
                Number</label>
            <input type="text"
                   value="{{ isset($item) ? $item->owner_contact:old('owner_contact') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}owner_contact"
                   name="owner_contact">
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
            <label for="{{ isset($item) ? $item->id:'' }}single_point_of_failure" class="form-label">Single Point of Failure</label>
            <select class="form-select select2" name="single_point_of_failure"
                    id="{{ isset($item) ? $item->id:'' }}single_point_of_failure">
                <option value="">-Select Point of Failure-</option>
                <option value="1" {{ isset($item) && $item->single_point_of_failure == 1  ? 'selected' : ''}}>Yes</option>
                <option value="2" {{ isset($item)  && $item->single_point_of_failure == 2  ? 'selected' : ''}}>No</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}process" class="form-label">Process</label>
            <select class="form-control select2" id="process" name="process">
                <option value="">-Select Process-</option>
                @foreach(\App\Models\Process::all() as $process)
                    <option value="{{ $process->id }}" data-id="{{$process->criticality}}" {{ isset($item) && $item->process == $process->id  ? 'selected' : ''}}>{{ $process->process }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}criticality" class="form-label">Criticality</label>
            <select class="form-control" id="criticality" name="criticality"  disabled>
                <option value="">-Select Process-</option>
                <option value="1" {{ isset($item) && $item->criticality == 1  ? 'selected' : ''}}>High</option>
                <option value="2" {{ isset($item)  && $item->criticality == 2  ? 'selected' : ''}}>Medium</option>
                <option value="3" {{ isset($item)  && $item->criticality == 3  ? 'selected' : ''}}>Low</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}parent_asset_id" class="form-label">Asset Parent</label>
            <select class="form-control select2" id="parent_asset_id" name="parent_asset_id">
                <option value="">-Select Parent Asset ID-</option>
                @foreach(\App\Models\Location::all() as $parent_asset_id)
                    <option value="{{ $parent_asset_id->id }}" {{ isset($item) && $item->parent_asset_id == $parent_asset_id->id  ? 'selected' : ''}}>{{ $parent_asset_id->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}sim_ssid"
                   class="form-label">Sim SSID</label>
            <input type="text" value="{{ isset($item) ? $item->sim_ssid:old('sim_ssid') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}sim_ssid"
                   name="sim_ssid">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}sim_imsi"
                   class="form-label">Sim IMSI</label>
            <input type="text" value="{{ isset($item) ? $item->sim_imsi:old('sim_imsi') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}sim_imsi"
                   name="sim_imsi">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}sim_misisdn" class="form-label">Sim MISISDN</label>
            <input type="text"
                   value="{{ isset($item) ? $item->sim_misisdn:old('sim_misisdn') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}sim_misisdn"
                   name="sim_misisdn">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}communication_type"
                   class="form-label">Communication Type</label>
            <input type="text" value="{{ isset($item) ? $item->communication_type:old('communication_type') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}communication_type"
                   name="communication_type">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}parent_asset_id" class="form-label">Controlll</label>
            <select class="form-control" id="controll" name="controll">
                <option value="">-Select Controll-</option>
                <option value="1" {{ isset($item) && $item->controll == 1  ? 'selected' : ''}}>Yes</option>
                <option value="2" {{ isset($item)  && $item->controll == 2  ? 'selected' : ''}}>No</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}impact_of_equipment" class="form-label">Impact of equipment</label>
            <input type="text"
                   value="{{ isset($item) ? $item->impact_of_equipment:old('impact_of_equipment') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}impact_of_equipment"
                   name="impact_of_equipment">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}connected_site"
                   class="form-label">Connected to Site</label>
            <input type="text" value="{{ isset($item) ? $item->connected_site:old('connected_site') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}connected_site"
                   name="connected_site">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}ot_apn" class="form-label">OT APN</label>
            <input type="text"
                   value="{{ isset($item) ? $item->ot_apn:old('ot_apn') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}ot_apn"
                   name="ot_apn">
        </div>
    </div>
</div>


