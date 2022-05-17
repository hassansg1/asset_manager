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
            <label for="{{ isset($item) ? $item->id:'' }}asset_contact_person"
                   class="form-label">Asset Contact Person</label>
            <input type="text" value="{{ isset($item) ? $item->asset_contact_person:old('asset_contact_person') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}asset_contact_person"
                   name="asset_contact_person">
        </div>
    </div>
</div>
<div class="row">
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

