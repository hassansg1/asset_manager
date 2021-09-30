<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterAssetController extends Controller
{
    //
    public function index($parent, $class = null)
    {
        $parent = str_replace('_', '??', $parent);
        $parent = str_replace('-', '\\', $parent);
        $contr = ComputerAssetController::class;
        if ($class)
            $contr = str_replace('-', '\\', $class);

        $res = app($contr)->index($parent);

        return $res;
    }
}
