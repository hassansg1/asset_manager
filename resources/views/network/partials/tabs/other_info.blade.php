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
