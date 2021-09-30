<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model
{
    use HasFactory;

    protected $table = 'operating_systems';

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
