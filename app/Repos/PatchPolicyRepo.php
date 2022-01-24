<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PatchPolicyRepo
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

        $this->applySoftwareFilter($request);
        $this->applyPatchFilter($request);
        $this->applyPatchesFilter($request);

        return $this->query;
    }

    public function applySoftwareFilter($request)
    {
        if (isset($request->software_id)) {
            $this->query = $this->query->where('software_id', $request->software_id);
        }
    }

    public function applyPatchFilter($request)
    {
        if (isset($request->patch_id)) {
            $this->query = $this->query->where('patch_id', $request->patch_id);
        }
    }
    public function applyPatchesFilter($request)
    {
        if (isset($request->patch_ids)) {
            $this->query = $this->query->whereIn('patch_id', $request->patch_ids);
        }
    }
}
