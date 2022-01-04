<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonePolicy extends Model
{
    use HasFactory;

    protected $table = 'zone_policy';

    protected $guarded = [];

    public $rules =
        [
        ];

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {

        if (isset($request->patch_id)) $item->patch_id = $request->patch_id;
        if (isset($request->software_id)) $item->software_id = $request->software_id;
        if (isset($request->approved)) $item->approved = $request->approved == "on" ? 1 : 0;

        $item->save();
        return $item;
    }
}
