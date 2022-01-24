<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PatchRepo
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
        $this->applyPatchFilter($request);
        $this->applyPatchIdsFilter($request);

        return $this->query;
    }

    public function applyFilterNotInSoftware($request)
    {
        if (isset($request->not_in_software_id_condition) && $request->not_in_software_id_condition == 1) {
            $softwareId = $request->not_in_software_id;
            $this->query = $this->query->where('software_id', '!=', $request->not_in_software_id);
            $this->query = $this->query->where('is_critical', '=', 1);
            $this->query = $this->query->whereDoesntHave('patchPolicy', function (Builder $query) use ($softwareId) {
                $query->where('software_id', $softwareId);
            });
        }

    }

    public function applyPatchFilter($request)
    {
        if (isset($request->patch_id) && $request->patch_id == 1) {
            $this->query = $this->query->where('id', '=', $request->patch_id);
        }
    }

    public function applyPatchIdsFilter($request)
    {
        if (isset($request->patch_ids)) {
            $this->query = $this->query->whereIn('id', $request->patch_ids);
        }
    }
}
