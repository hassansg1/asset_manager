<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PortReportRepo
{
    //
    public $query;

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function filter($query, $request)
    {
        $this->query = $query;

        $this->applyGroupByFilter($request);

        return $this->query;
    }

    public function applyGroupByFilter($request)
    {
        if (isset($request->groupBy)) {
            $this->query = $this->query->select('location_id')->groupBy($request->groupBy);
        }

    }
}
