<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Role;
use App\Models\SubSite;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    protected $paginateSize = 10;

    public function fetchData($model, $request = null, $repository = null, $filter = [], $hasPermissions = true)
    {
        if (isset($model::$type)) {
            $location = 1;
            if (assetCondition($model)) {
                $location = Session::get('asset_location_id');
            }
            $query = Location::whereDescendantOf($location)->where('type', $model::$type);
        } else
            $query = $model;

        if (isset($model::$repo)) {
            $repo = "App\\Repos\\" . $model::$repo;
            $repo = new $repo;
            $query = $repo->filter($query, $request);
        }
//        if ($repository) {
//            $repository = "App\\Repos\\" . $repository;
//            $repository = new $repository;
//            $query = $repository->filter($query, $request);
//        }

        $items = $query->paginate(10);
        $data['items'] = $items;
        return $data;
    }
}
