<?php

namespace App\Http\Controllers;

use App\Models\Parentable;
use Illuminate\Http\Request;

class FilterAssetController extends Controller
{
    //

    public static $allchilds = [];

    public function index($parent, $class = null)
    {
        $parent = str_replace('_', '??', $parent);
        $parent = str_replace('-', '\\', $parent);
        $contr = ComputerAssetController::class;
        if ($class)
            $contr = str_replace('-', '\\', $class);

        self::$allchilds[] = $parent;
        $explode = explode('??', $parent);
        $parentAble = Parentable::where('childable_type', $explode[0])->where('childable_id', $explode[1])->first();

        self::childRecusrion($parentAble);

        $res = app($contr)->index(self::$allchilds);

        return $res;
    }

    public static function childRecusrion($parent)
    {
        if (count($parent->noAssetChilds()) > 0) {
            foreach ($parent->noAssetChilds() as $parent) {
                self::$allchilds[] = $parent->combine_name;
                self::childRecusrion($parent);
            }
        }
    }
}
