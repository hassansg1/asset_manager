<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentable extends Model
{
    use HasFactory;

    protected $table = 'parentables';

    protected $guarded = [];

    public static function addNew($parentAbleType, $parentAbleId, $childAbleType, $childAbleId)
    {
        $arr = [
            'childable_type' => $childAbleType,
            'childable_id' => $childAbleId,
        ];
        self::where($arr)->delete();

        $arr = [
            'parentable_type' => $parentAbleType,
            'parentable_id' => $parentAbleId,
            'childable_type' => $childAbleType,
            'childable_id' => $childAbleId,
        ];

        return self::create($arr);
    }

    protected $appends = ['combine_name', 'combine_name_short'];


    public function getCombineNameAttribute()
    {
        return $this->childable_type . "??" . $this->childable_id;
    }


    public function getCombineNameShortAttribute()
    {
        return str_replace('\\', '', $this->childable_type) . "_" . $this->childable_id;
    }

    public function allParentsofChild()
    {

    }

    public static function getAllParents()
    {

        $arr = [
            'parentable_type' => null,
            'parentable_id' => null,
        ];

        return self::where($arr)->get();
    }

    public function noAssetChilds()
    {
        $arr = $this->childs()->whereNotIn('childable_type', [Asset::class]);

        return $arr;
    }

    public function childs()
    {

        $arr = [
            'parentable_type' => $this->childable_type,
            'parentable_id' => $this->childable_id,
        ];

        return self::where($arr)->get();
    }


    public function getSelfModel()
    {
        $obj = $this->childable_type::find($this->childable_id);
        if ($obj)
            return $obj;
        return null;
    }

    public function getSelfName()
    {
        $obj = $this->childable_type::find($this->childable_id);
        if ($obj)
            return $obj->show_name;
        return null;
    }

}
