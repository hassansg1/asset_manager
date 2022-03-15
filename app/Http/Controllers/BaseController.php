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
            $query = $this->applyLocationFilter($userLocations, $query, $model);
            $query = $query->where('type', $model::$type);
        }

        $query = $this->applyKeywordSearch($request, $query, $model);
        $query = $this->applyRepo($request, $query, $model, $repository);
        $data = $this->getData($request, $query, $items_per_page);

        if (isset($model::$type)) {
            $type = getTypeForPermission($model);
            $typeLocations = $userLocations->where('type', $type);
            $viewPermissions = $typeLocations->where('action', 'view')->pluck('location_id')->toArray();
            $editPermissions = $typeLocations->where('action', 'edit')->pluck('location_id')->toArray();
            $deletePermissions = $typeLocations->where('action', 'delete')->pluck('location_id')->toArray();
            $items = $data['items'] ?? null;
            if ($items) {
                foreach ($items as $item) {
                    if (in_array($item->parent_id, $viewPermissions) || in_array($item->id, $viewPermissions)) {
                        $item->can_view = 1;
                    }
                    if (in_array($item->parent_id, $editPermissions) || in_array($item->id, $editPermissions)) {
                        $item->can_edit = 1;
                    }
                    if (in_array($item->parent_id, $deletePermissions) || in_array($item->id, $deletePermissions)) {
                        $item->can_delete = 1;
                    }
                }
            }
        }

        $data['items_per_page'] = $items_per_page;
        $data['request'] = $request;
        $data['request']['url'] = Request::url();
        return $data;
    }

    public function applyLocationFilter($userLocations, $query, $model)
    {
        if (!checkIfSuperAdmin()) {
            $query = $query->where(function ($query) use ($userLocations, $model) {
                $locations = $userLocations->where('type', 'location')->pluck('location_id')->toArray();
                $query = $query->whereIn('id', $locations);
                $type = getTypeForPermission($model);
                $hierarchyLocations = $userLocations->where('type', $type)->pluck('location_id')->toArray();
                foreach ($hierarchyLocations as $location) {
                    $query->orWhere(function ($innerQuery) use ($location) {
                        $innerQuery->whereDescendantOrSelf($location);
                    });
                }
            });
        }

        return $query;
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
            $query = $query->where(function ($query) use ($keyword, $columns) {
                foreach ($columns as $column) {
                    $query = $query->orWhere($column, 'LIKE', "%$keyword%");
                }
            });
        }

        return $query;
    }
}
