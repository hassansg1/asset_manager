<?php

namespace App\Models;

use App\Http\Traits\Observable;
use App\Http\Traits\ParentTrait;
use App\Scopes\LocationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class LoneAsset extends Model
{
    use HasFactory;
    use Observable;
    use NodeTrait;

    protected $table = 'locations';

    public static $type = 'lone';


    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        return static::addGlobalScope(new LocationScope(self::$type));
    }
    public $rules =
        [
            'rec_id' => 'required | unique:locations,rec_id',
        ];

    protected $appends = ['show_name'];

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
        if (isset($request->rec_id)) $item->rec_id = $request->rec_id;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->function)) $item->function = $request->function;
        if (isset($request->make)) $item->make = $request->part_number;
        if (isset($request->model)) $item->model = $request->model;
        if (isset($request->part_number)) $item->part_number = $request->part_number;
        if (isset($request->serial_number)) $item->serial_number = $request->serial_number;
        if (isset($request->security_zone)) $item->security_zone = $request->security_zone;
        if (isset($request->comment)) $item->comment = $request->comment;


        if (isset($request->asset_firmware)) $item->asset_firmware = $request->asset_firmware;
        if (isset($request->redundant_pair_id)) $item->redundant_pair_id = $request->redundant_pair_id;
        if (isset($request->connected_scada_server)) $item->connected_scada_server = $request->connected_scada_server;
        if (isset($request->asset_parent_code)) $item->asset_parent_code = $request->asset_parent_code;
        if (isset($request->owner_contact)) $item->owner_contact = $request->owner_contact;

        if (isset($request->hardware_legacy)) $item->hardware_legacy = $request->hardware_legacy;
        if (isset($request->process)) $item->process = $request->process;
        if (isset($request->single_point_of_failure)) $item->single_point_of_failure = $request->single_point_of_failure;
        if (isset($request->criticality)) $item->criticality = $request->criticality;

        if (isset($request->parent_asset_id)) $item->parent_asset_id = $request->parent_asset_id;
        if (isset($request->sim_ssid)) $item->sim_ssid = $request->sim_ssid;
        if (isset($request->sim_imsi)) $item->sim_imsi = $request->sim_imsi;
        if (isset($request->sim_misisdn)) $item->sim_misisdn = $request->sim_misisdn;
        if (isset($request->communication_type)) $item->communication_type = $request->communication_type;
        if (isset($request->controll)) $item->controll = $request->controll;
        if (isset($request->impact_of_equipment)) $item->impact_of_equipment = $request->impact_of_equipment;
        if (isset($request->connected_site)) $item->connected_site = $request->connected_site;
        if (isset($request->ot_apn)) $item->ot_apn = $request->ot_apn;


        $item->type = self::$type;
        $parent = Location::find($request->parent_id);
        $item->save();
        $newItem = Location::find($item->id);
        $parent->appendNode($newItem);
        return $item;
    }
}
