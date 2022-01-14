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

    public function fetchData($model, $request = null, $filter = [], $hasPermissions = true)
    {
        if (isset($model::$type)) {
            $location = 1;
            if (assetCondition($model)) {
                $location = Session::get('asset_location_id');
            }
            $items = Location::where('type', $model::$type)->paginate(10);
        } else
            $items = $model->paginate(10);

        $data['items'] = $items;
        return $data;
    }
}
