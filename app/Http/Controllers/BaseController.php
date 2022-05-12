<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\UserLocation;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;

class BaseController extends Controller
{
    protected $paginateSize = 10;

    public function fetchData($model, $request = null, $repository = null, $filter = [], $hasPermissions = true)
    {
        $query = $model;
        $items_per_page = 10;

        if (isset($model::$type)) {
            $query = new Location();
            $userLocations = UserLocation::getLocations();
            $query = Location::applyLocationFilter($userLocations, $model, $query);
            if (is_array( $model::$type))
                $query = $query->whereIn('type', $model::$type);
            else
                $query = $query->where('type', $model::$type);
        }

        $query = $this->applyKeywordSearch($request, $query, $model);
        $query = $this->applyRepo($request, $query, $model, $repository);
        $data = $this->getData($request, $query, $items_per_page);

        if (isset($model::$type)) {
            $type = getTypeForPermission($model);
            $typeLocations = $userLocations->where('type', $type);
            $data['typeLocations'] = $typeLocations ?? [];
        }

        $data['items_per_page'] = $items_per_page;
        $data['request'] = $request;
        $data['request']['url'] = Request::url();
        return $data;
    }


    public function getData($request, $query, $items_per_page)
    {
        $data = [];
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

        return $data;
    }

    public function applyRepo($request, $query, $model, $repository)
    {
        if (!isset($repository)) {
            if (isset($model::$repo)) {
                $repository = "App\\Repos\\" . $model::$repo;
                $repository = new $repository;
            }
        }
        if ($repository) {
            $query = $repository->filter($query, $request);
        }

        return $query;
    }

    public function applyKeywordSearch($request, $query, $model)
    {
        $columns = Schema::getColumnListing($model->getTable());

        if (isset($request->search_keyword) && $request->search_keyword != "") {
            $keyword = $request->search_keyword;
            $query = $query->where(function ($query) use ($keyword, $columns, $model) {
                foreach ($columns as $column) {
                    $query = $query->orWhere($model->getTable() . '.' . $column, 'LIKE', "%$keyword%");
                }
            });
        }

        return $query;
    }
}
