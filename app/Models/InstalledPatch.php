<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstalledPatch extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $table = 'installed_patches';

    protected $guarded = [];

    public $rules =
        [
        ];

    public function patch()
    {
        return $this->belongsTo(Patch::class);
    }

    public function asset()
    {
        return $this->belongsTo(Location::class, 'asset_id');
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {

        if (isset($request->asset_id)) $item->asset_id = $request->asset_id;
        if (isset($request->patch_id)) $item->patch_id = $request->patch_id;

        $item->save();
        return $item;
    }
}
