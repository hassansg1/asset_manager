<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetFunction extends Model
{
    use HasFactory;

    protected $table = 'asset_function';

    protected $guarded = [];

    public $rules =
        [
            'name' => 'required|unique:asset_function',
        ];


    /**
     * @param $name
     * @param bool $returnId
     * @return mixed
     */
    public static function createNew($name, bool $returnId = true)
    {
        $new = self::updateOrCreate([
            'name' => $name
        ],[
            'name' => $name
        ]);
        if ($returnId) return $new->id;
        return $new;
    }
    /**
     * @param $value
     */

    public function saveFormData($item, $request)
    {
        if (isset($request->name)) $item->name = $request->name;
        $item->save();
        return $item;
    }
}
