<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMake extends Model
{
    use HasFactory;

    protected $table = 'asset_make';

    protected $guarded = [];

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
}
