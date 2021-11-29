<?php

namespace App\Models;

use App\Http\Traits\Observable;
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

    protected $appends = ['combine_name', 'combine_name_short', 'parent'];


    public function getCombineNameAttribute()
    {
        return $this->childable_type . "??" . $this->childable_id;
    }


    public function getCombineNameShortAttribute()
    {
        return str_replace('\\', '', $this->childable_type) . "_" . $this->childable_id;
    }

    public function getParentAttribute()
    {
        $parentName = str_replace('\\', '', $this->parentable_type) . $this->parentable_id;
        return $parentName != "" ? $parentName : 0;
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

        $parents = self::where($arr)->get();
        return $parents;
    }

    public function noAssetChilds()
    {
        $arr = $this->childs()->whereNotIn('childable_type', [NetworkAsset::class])->whereNotIn('childable_type', [Computer::class])->whereNotIn('childable_type', [LoneAsset::class]);

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

    public static $tree;

    public static function getTree()
    {
//
        $pr = Parentable::find(1);
        $bb = self::recursive($pr);


        print_r('<pre>');
        print_r($bb);
        print_r('<pre>');
        exit();
    }

    static function recursive($r)
    {
        $breads = [strval($r->combine_name_short)];

        if (count($r->getAllParents()) > 0) {
            foreach ($r->getAllParents() as $aaa)
                $breads = array_merge(self::recursive($aaa), $breads);
        }

        return $breads;
    }


    public static function recursive_append_children($arr, $children)
    {
        foreach ($arr as $key => $page)
            if (isset($children[$key]))
                $arr[$key]['children'] = self::recursive_append_children($children[$key], $children);
        return $arr;
    }

    public static function getTreeElements($element, $position)
    {
        dump("current array value:" . json_encode($children[$position]));
        $elementName = $element->getSelfName();

        $array[$elementName] = [
            'name' => $elementName,
            'nodes' => []
        ];

        if (count($element->noAssetChilds()) > 0) {
            foreach ($element->noAssetChilds() as $child) {
                self::getTreeElements($child, $array[$elementName]['nodes']);
            }
        }

    }
}
