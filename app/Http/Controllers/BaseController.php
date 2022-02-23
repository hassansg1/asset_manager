<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    protected $paginateSize = 10;

    public function fetchData($model, $request = null, $repository = null, $filter = [], $hasPermissions = true)
    {
        $query = $model;
        $items_per_page = 10;
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


        if (isset($request->search_keyword) && $request->search_keyword != "") {
            $keyword = $request->search_keyword;
            $query = $query->where(function ($query) use ($keyword, $columns) {
                foreach ($columns as $column) {
                    $query = $query->orWhere($column, 'LIKE', "%$keyword%");
                }
            });
        }

        if (!isset($repository)) {
            if (isset($model::$repo)) {
                $repository = "App\\Repos\\" . $model::$repo;
                $repository = new $repository;
            }
        }
        if ($repository) {
            $query = $repository->filter($query, $request);
        }
        if (getSetting()) {
            $items_per_page = getSetting()->item_per_page;
        }
        if (isset($request->items_per_page) && $request->items_per_page != "") {
            $items_per_page = $request->items_per_page;
        }
        if ($items_per_page == "all") {
            $items = $query->get();
            $data['no_pagination'] = true;
        } else
            $items = $query->paginate($items_per_page);

        $data['items'] = $items;
        $data['request'] = $request;
        $data['request']['url'] = Request::url();
        return $data;
    }
}
