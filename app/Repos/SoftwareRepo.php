<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SoftwareRepo
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

        $this->applyFilterNotInSoftware($request);
        $this->applySoftwareIdsFilter($request);

        return $this->query;
    }

    public function applyFilterNotInSoftware($request)
    {
        if (isset($request->not_in_software_id_condition) && $request->not_in_software_id_condition == 1) {
            $this->query = $this->query->where('id', '!=', $request->not_in_software_id);
            $this->query = $this->query->where('approval_required', '=', 1);
        }
    }

    public function applySoftwareIdsFilter($request)
    {
        if (isset($request->software_ids)) {
            $this->query = $this->query->whereNotIn('id', $request->software_ids);
            $this->query = $this->query->where('approval_required', '=', 1);
        }
    }
}
