<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    protected $paginateSize = 10;

    public function fetchData($model, $request = null, $filter = null)
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
        $items = $model->get();
        $totalItems = $total->count('*');
        $data['totalItems'] = $totalItems;
        $data['currentTotalItems'] = count($items);
        $data['start'] = ((int)($currentPage - 1) * $perPage) + 1;
        $data['end'] = $data['start'] + count($items) - 1;
        $data['paginateText'] = $data['start'] . '-' . $data['end'] . ' of' . $data['totalItems'];
        if ($filter) {
            $items = $items->where('parent_combine', $filter);
        }
//        if (!checkIfSuperAdmin()) $items = $items->whereIn('parent_combine', Auth::user()->locationsArray());

        $items = $items->filter(function ($value, $key) {
            return doUserHasPermission('view' . $value->permission_string) || checkIfSuperAdmin();
        });

        $data['items'] = $items;
        return $data;
    }
}
