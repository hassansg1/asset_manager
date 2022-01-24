<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use App\Repos\PatchRepo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patch extends Model
{
    use HasFactory;

    protected $table = 'patches';

    public static $repo = 'PatchRepo';

    protected $guarded = [];

    public $rules =
        [
        ];

    protected $appends = ['show_name'];

    public function getShowNameAttribute()
    {
        return $this->name . " (" . $this->software->show_name . ")";
    }

    public function patchPolicy()
    {
        return $this->hasMany(PatchPolicy::class, 'patch_id');
    }

    public function software()
    {
        return $this->belongsTo(Software::class);
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
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->release_date)) $item->release_date = $request->release_date;
        if (isset($request->is_required) && $request->is_required == "on") $item->is_required = 1; else $item->is_required = 0;
        if (isset($request->is_critical) && $request->is_critical == "on") $item->is_critical = 1; else $item->is_critical = 0;

        $item->save();
        return $item;
    }
}
