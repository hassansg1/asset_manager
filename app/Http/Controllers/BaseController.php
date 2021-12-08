<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Role;
use App\Models\SubSite;
use Illuminate\Support\Facades\Schema;

class BaseController extends Controller
{
    protected $paginateSize = 10;

    public function fetchData($model, $request = null, $filter = [], $hasPermissions = true)
    {
        $items = $model;
        $total = $model;
        $currentPage = $request->currentPage ?? 1;
        $perPage = $request->perPage ?? $this->paginateSize;
        if ($request) {
            if (isset($request->perPage)) {
                $this->paginateSize = $request->perPage;
            }
            if (isset($request->search)) {
                $columns = Schema::getColumnListing($model->getTable());
                $keyWord = $request->search;
                $items->where(function ($query) use ($columns, $keyWord) {
                    foreach ($columns as $column) {
                        $query->orWhere($column, $keyWord);
                    }
                });
            }

        }
        if (isset($model::$type))
            $items = Location::whereDescendantOf(1)->where('type',$model::$type)->paginate(10);
        else
            $items = $model->paginate(10);


        $totalItems = $total->count('*');
        $data['totalItems'] = $totalItems;
        $data['currentTotalItems'] = count($items);
        $data['start'] = ((int)($currentPage - 1) * $perPage) + 1;
        $data['end'] = $data['start'] + count($items) - 1;
        $data['paginateText'] = $data['start'] . '-' . $data['end'] . ' of' . $data['totalItems'];
//        if (isset($filter) && count($filter) > 0) {
//            $items = $items->whereIn('parent_combine', $filter);
//        }

//        if ($hasPermissions) {
//            $items = $this->applyPermissions($items, $model);
//        }

//        $items = $items->filter(function ($value, $key) {
//            dd($value->permission_string);
//            return doUserHasPermission('view' . $value->permission_string) || checkIfSuperAdmin();
//        });

        $data['items'] = $items;
        return $data;
    }

    public function applyPermissions($items, $model)
    {
        if (!checkIfSuperAdmin()) {
            if (hierarchyCondition($model)) {
                $items = $items->whereIn('combine', Role::locationsArray());
            } elseif (assetCondition($model)) {
                $items = $items->whereIn('full_permission_string', Role::permissionsArray());
            } else {
                $items = $items->whereIn('parent_combine', Role::locationsArray());
            }
        }

        return $items;
    }
}
