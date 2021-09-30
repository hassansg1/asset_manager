<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoneAsset extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $guarded = [];

    public $rules =
        [
            'name' => 'required | max:255',
        ];

    protected $appends = ['name'];

    public function getShowNameAttribute()
    {
        return $this->name;
    }


    /**
     * @param $value
     */
    public function setCategoryAttribute($value)
    {
        if (!is_numeric($value) || AssetCategories::find($value) == null) {
            $value = AssetCategories::createNew($value);
        }
        $this->attributes['category'] = $value;
    }

    /**
     * @param $value
     */
    public function setFunctionAttribute($value)
    {
        if (!is_numeric($value) || AssetFunction::find($value) == null) {
            $value = AssetFunction::createNew($value);
        }
        $this->attributes['function'] = $value;
    }

    /**
     * @param $value
     */
    public function setMakeAttribute($value)
    {
        if (!is_numeric($value) || AssetMake::find($value) == null) {
            $value = AssetMake::createNew($value);
        }
        $this->attributes['make'] = $value;
    }

    /**
     * @param $value
     */
    public function setSecurityZoneAttribute($value)
    {
        if (!is_numeric($value) || AssetSecurityZone::find($value) == null) {
            $value = AssetSecurityZone::createNew($value);
        }
        $this->attributes['security_zone'] = $value;
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {

        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->code)) $item->code = $request->code;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->function)) $item->function = $request->function;
        if (isset($request->make)) $item->make = $request->make;
        if (isset($request->model)) $item->model = $request->model;
        if (isset($request->part_number)) $item->part_number = $request->part_number;
        if (isset($request->serial_number)) $item->serial_number = $request->serial_number;
        if (isset($request->security_zone)) $item->security_zone = $request->security_zone;
        if (isset($request->existing_asset_id)) $item->existing_asset_id = $request->existing_asset_id;
        if (isset($request->existing_asset_name)) $item->existing_asset_name = $request->existing_asset_name;
        if (isset($request->asset_parent_code)) $item->asset_parent_code = $request->asset_parent_code;
        if (isset($request->sim_imsi)) $item->sim_imsi = $request->sim_imsi;
        if (isset($request->sim_msisdn)) $item->sim_msisdn = $request->sim_msisdn;
        if (isset($request->sim_iccid)) $item->sim_iccid = $request->sim_iccid;
        if (isset($request->process_equipment)) $item->process_equipment = $request->process_equipment;
        if (isset($request->wan_interface)) $item->wan_interface = $request->wan_interface;
        if (isset($request->wan_interface_address)) $item->wan_interface_address = $request->wan_interface_address;
        if (isset($request->wan_interface_protocal)) $item->wan_interface_protocal = $request->wan_interface_protocal;
        if (isset($request->comm_interface_1)) $item->comm_interface_1 = $request->comm_interface_1;
        if (isset($request->comm_interface_1_protocal)) $item->comm_interface_1_protocal = $request->comm_interface_1_protocal;
        if (isset($request->comm_interface_1_address)) $item->comm_interface_1_address = $request->comm_interface_1_address;
        if (isset($request->comm_interface_2)) $item->comm_interface_2 = $request->comm_interface_2;
        if (isset($request->comm_interface_2_protocal)) $item->comm_interface_2_protocal = $request->comm_interface_2_protocal;
        if (isset($request->comm_interface_2_address)) $item->comm_interface_2_address = $request->comm_interface_2_address;
        if (isset($request->comm_interface_3)) $item->comm_interface_3 = $request->comm_interface_3;
        if (isset($request->comm_interface_3_protocal)) $item->comm_interface_3_protocal = $request->comm_interface_3_protocal;
        if (isset($request->comm_interface_3_address)) $item->comm_interface_3_address = $request->comm_interface_3_address;
        if (isset($request->communication_type)) $item->communication_type = $request->communication_type;
        if (isset($request->control)) $item->control = $request->control;
        if (isset($request->equipment_unavailalbe)) $item->equipment_unavailalbe = $request->equipment_unavailalbe;
        if (isset($request->redundant_pair_id)) $item->redundant_pair_id = $request->redundant_pair_id;
        if (isset($request->connected_to_site)) $item->connected_to_site = $request->connected_to_site;
        if (isset($request->owner_contact)) $item->owner_contact = $request->owner_contact;
        if (isset($request->data_source)) $item->data_source = $request->data_source;
        if (isset($request->data_source_1)) $item->data_source_1 = $request->data_source_1;
        if (isset($request->data_source_2)) $item->data_source_2 = $request->data_source_2;
        if (isset($request->dl_start_time_1)) $item->dl_start_time_1 = $request->dl_start_time_1;
        if (isset($request->dl_start_time_2)) $item->dl_start_time_2 = $request->dl_start_time_2;
        if (isset($request->dl_start_time_3)) $item->dl_start_time_3 = $request->dl_start_time_3;
        if (isset($request->application_file_for_firm)) $item->application_file_for_firm = $request->application_file_for_firm;
        if (isset($request->firmware_upgrade_date)) $item->firmware_upgrade_date = $request->firmware_upgrade_date;
        if (isset($request->firmware_upgrade_by)) $item->firmware_upgrade_by = $request->firmware_upgrade_by;
        if (isset($request->firmware_upgrade_proof)) $item->firmware_upgrade_proof = $request->firmware_upgrade_proof;
        if (isset($request->firmware_upgrade_comment)) $item->firmware_upgrade_comment = $request->firmware_upgrade_comment;
        if (isset($request->new_ot_configuration_status)) $item->new_ot_configuration_status = $request->new_ot_configuration_status;
        if (isset($request->data_logger_update_date)) $item->data_logger_update_date = $request->data_logger_update_date;
        if (isset($request->data_logger_update_by)) $item->data_logger_update_by = $request->data_logger_update_by;

        $item->save();
        $this->updateParent($request, $item);
        return $item;
    }
}
