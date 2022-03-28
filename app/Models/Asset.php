<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $guarded = [];

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
        if (isset($request->make)) $item->make = $request->make;
        if (isset($request->model)) $item->model = $request->model;
        if (isset($request->part_number)) $item->part_number = $request->part_number;
        if (isset($request->serial_number)) $item->serial_number = $request->serial_number;
        if (isset($request->security_zone)) $item->security_zone = $request->security_zone;

        $item->save();
        $this->updateParent($request,$item);
        return $item;
    }
}
