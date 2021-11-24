<?php

namespace App\Models;

use App\Http\Traits\Observable;
use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    use ParentTrait;
    use Observable;

    protected $table = 'computer_assets';

    protected $guarded = [];

    public $rules =
        [
            'rec_id' => 'required | unique:computer_assets,rec_id',
        ];

    protected $appends = ['show_name'];

    public function getShowNameAttribute()
    {
        return $this->name;
    }


    public function ports()
    {
        return $this->morphMany(Port::class, 'portable');
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
        if (isset($request->make)) $item->make = $request->make;
        if (isset($request->model)) $item->model = $request->model;
        if (isset($request->part_number)) $item->part_number = $request->part_number;
        if (isset($request->serial_number)) $item->serial_number = $request->serial_number;
        if (isset($request->security_zone)) $item->security_zone = $request->security_zone;
        if (isset($request->client_description)) $item->client_description = $request->client_description;
        if (isset($request->vm_host)) $item->vm_host = $request->vm_host;
        if (isset($request->operating_system)) $item->operating_system = $request->operating_system;
        if (isset($request->connected_scada_server)) $item->connected_scada_server = $request->connected_scada_server;
        if (isset($request->contact)) $item->contact = $request->contact;
        if (isset($request->source_file)) $item->source_file = $request->source_file;
        if (isset($request->comment)) $item->source_file = $request->comment;

        $item->save();
        $this->updateParent($request, $item);

        if (isset($request->ports)) {
            Port::updatePorts($item, $request->ports);
        }

        return $item;
    }
}
