<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    protected $paginateSize = 10;

    public function fetchData($model, $request = null, $repository = null, $filter = [], $hasPermissions = true)
    {
        $query = $model;
        if (isset($model::$type)) {
            $location = 1;
            if (assetCondition($model)) {
                $location = Session::get('asset_location_id');
            }
            $doesLocationExist = Location::find($location);
            if ($doesLocationExist && $model::$type != "companies")
                $query = Location::whereDescendantOf($location)->where('type', $model::$type);
        } else
            $query = $model;

        $columns = Schema::getColumnListing($model->getTable());


//        if (isset($request->search_keyword) && $request->search_keyword != "") {
//            $keyword = $request->search_keyword;
//            $query = $query->where(function ($query) use ($keyword, $columns) {
//                foreach ($columns as $column) {
//                    $query = $query->orWhere($column, 'LIKE', "%$keyword%");
//                }
//            });
//        }

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
