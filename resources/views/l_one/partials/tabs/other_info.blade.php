<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}existing_asset_id"
                   class="form-label">Existing Asset ID</label>
            <input type="text" value="{{ isset($item) ? $item->existing_asset_id:old('existing_asset_id') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}existing_asset_id"
                   name="existing_asset_id">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}existing_asset_name"
                   class="form-label">Existing Asset Name</label>
            <input type="text" value="{{ isset($item) ? $item->existing_asset_name:old('existing_asset_name') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}existing_asset_name"
                   name="existing_asset_name">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}asset_parent_code"
                   class="form-label">Existing Asset Code</label>
            <input type="text" value="{{ isset($item) ? $item->asset_parent_code:old('asset_parent_code') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}asset_parent_code"
                   name="asset_parent_code">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}equipment_unavailalbe" class="form-label">Equipment Unavailable
                Address
                Protocol</label>
            <input type="text"
                   value="{{ isset($item) ? $item->equipment_unavailalbe:old('equipment_unavailalbe') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}equipment_unavailalbe"
                   name="equipment_unavailalbe">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}redundant_pair_id" class="form-label">Redundant Pair ID</label>
            <input type="text"
                   value="{{ isset($item) ? $item->redundant_pair_id:old('redundant_pair_id') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}redundant_pair_id"
                   name="redundant_pair_id">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}connected_to_site" class="form-label">Connected to Site
                Address</label>
            <input type="text"
                   value="{{ isset($item) ? $item->connected_to_site:old('connected_to_site') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}connected_to_site"
                   name="connected_to_site">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}owner_contact" class="form-label">Owner Contact
                Protocol</label>
            <input type="text"
                   value="{{ isset($item) ? $item->owner_contact:old('owner_contact') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}owner_contact"
                   name="owner_contact">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}data_source" class="form-label">Data Source</label>
            <input type="text"
                   value="{{ isset($item) ? $item->data_source:old('data_source') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}data_source"
                   name="data_source">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}data_source_1" class="form-label">Data Sorce 1</label>
            <input type="text"
                   value="{{ isset($item) ? $item->data_source_1:old('data_source_1') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}data_source_1"
                   name="data_source_1">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}dl_start_time_1" class="form-label">DL Start Time 1</label>

            <input
                    value="{{ isset($item) ? $item->dl_start_time_1:old('dl_start_time_1') ?? ''  }}"
                    id="{{ isset($item) ? $item->id:'' }}dl_start_time_1"
                    name="dl_start_time_1"
                    type="text" class="form-control" placeholder="dd M, yyyy"
                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                    data-provide="datepicker">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}dl_start_time_2" class="form-label">DL Start Time 2</label>

            <input
                    value="{{ isset($item) ? $item->dl_start_time_2:old('dl_start_time_2') ?? ''  }}"
                    id="{{ isset($item) ? $item->id:'' }}dl_start_time_2"
                    name="dl_start_time_2"
                    type="text" class="form-control" placeholder="dd M, yyyy"
                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                    data-provide="datepicker">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}dl_start_time_3" class="form-label">DL Start Time 3</label>

            <input
                    value="{{ isset($item) ? $item->dl_start_time_3:old('dl_start_time_3') ?? ''  }}"
                    id="{{ isset($item) ? $item->id:'' }}dl_start_time_3"
                    name="dl_start_time_3"
                    type="text" class="form-control" placeholder="dd M, yyyy"
                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                    data-provide="datepicker">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}application_file_for_firm" class="form-label">Application File
                For Firm</label>
            <input type="text"
                   value="{{ isset($item) ? $item->application_file_for_firm:old('application_file_for_firm') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}application_file_for_firm"
                   name="application_file_for_firm">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}firmware_upgrade_date" class="form-label">Firm Upgrade
                Date</label>

            <input
                    value="{{ isset($item) ? $item->firmware_upgrade_date:old('firmware_upgrade_date') ?? ''  }}"
                    id="{{ isset($item) ? $item->id:'' }}firmware_upgrade_date"
                    name="firmware_upgrade_date"
                    type="text" class="form-control" placeholder="dd M, yyyy"
                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                    data-provide="datepicker">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}firmware_upgrade_by" class="form-label">Firm Upgraded
                By</label>
            <input type="text"
                   value="{{ isset($item) ? $item->firmware_upgrade_by:old('firmware_upgrade_by') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}firmware_upgrade_by"
                   name="firmware_upgrade_by">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}firmware_upgrade_proof" class="form-label">Formware Upgrade
                Proof</label>
            <input type="text"
                   value="{{ isset($item) ? $item->firmware_upgrade_proof:old('firmware_upgrade_proof') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}firmware_upgrade_proof"
                   name="firmware_upgrade_proof">
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}firmware_upgrade_comment" class="form-label">Firm Upgraded
                Comment</label>
            <input type="text"
                   value="{{ isset($item) ? $item->firmware_upgrade_comment:old('firmware_upgrade_comment') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}firmware_upgrade_comment"
                   name="firmware_upgrade_comment">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}data_logger_update_date" class="form-label">Date Logger Updated
                Date</label>

            <input
                    value="{{ isset($item) ? $item->data_logger_update_date:old('data_logger_update_date') ?? ''  }}"
                    id="{{ isset($item) ? $item->id:'' }}data_logger_update_date"
                    name="data_logger_update_date"
                    type="text" class="form-control" placeholder="dd M, yyyy"
                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                    data-provide="datepicker">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}new_ot_configuration_status" class="form-label">New OT
                Configuration Status</label>
            <input type="text"
                   value="{{ isset($item) ? $item->new_ot_configuration_status:old('new_ot_configuration_status') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}new_ot_configuration_status"
                   name="new_ot_configuration_status">
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}data_logger_update_by" class="form-label">Date Logger Updated
                By</label>
            <input type="text"
                   value="{{ isset($item) ? $item->data_logger_update_by:old('data_logger_update_by') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}data_logger_update_by"
                   name="data_logger_update_by">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}firmware_upgrade_comment" class="form-label">Firm Upgraded
                Comment</label>
            <input type="text"
                   value="{{ isset($item) ? $item->firmware_upgrade_comment:old('firmware_upgrade_comment') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}firmware_upgrade_comment"
                   name="firmware_upgrade_comment">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="{{ isset($item) ? $item->id:'' }}process_equipment" class="form-label">Process Equipment</label>
            <input type="text"
                   value="{{ isset($item) ? $item->process_equipment:old('process_equipment') ?? ''  }}"
                   class="form-control" id="{{ isset($item) ? $item->id:'' }}process_equipment"
                   name="process_equipment">
        </div>
    </div>
</div>