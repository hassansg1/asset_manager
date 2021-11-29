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
            'name' => $name,
        ]);
        if ($returnId) return $new->id;
        return $new;
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {
        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->end_of_life)) $item->end_of_life = $request->end_of_life;

        $item->save();
        return $item;
    }
}
