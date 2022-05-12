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

