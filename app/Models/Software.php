<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $table = 'softwares';

    protected $guarded = [];

    public $rules =
        [
            'name' => 'required | max:255',
        ];

    protected $appends = ['show_name'];

    public function getShowNameAttribute()
    {
        return $this->name ." ". $this->version;
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
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

        if (isset($request->vendor_id)) $item->vendor_id = $request->vendor_id;
        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->version)) $item->version = $request->version;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->function)) $item->function = $request->function;
        if (isset($request->approval_required)) $item->approval_required = $request->approval_required == "on" ? 1 : 0;

        $item->save();
        $this->updateParent($request, $item);
        return $item;
    }
}
