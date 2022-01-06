<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareComponent extends Model
{
    use HasFactory;

    protected $table = 'software_components';

    protected $guarded = [];

    public $rules =
        [
            'name' => 'required | max:255',
        ];

    protected $appends = ['show_name'];

    public function getShowNameAttribute()
    {
        return $this->name . " " . $this->version;
    }

    public function software()
    {
        return $this->belongsTo(Software::class, 'software_id');
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {

        if (isset($request->software_id)) $item->software_id = $request->software_id;
        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->version)) $item->version = $request->version;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->function)) $item->function = $request->function;

        $item->save();
        return $item;
    }
}
