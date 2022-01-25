<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

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
        $this->applySoftwareGroupByFilter($request);

        return $this->query;
    }

    public function applySoftwareFilter($request)
    {
        if (isset($request->software_id)) {
            $this->query = $this->query->where('software_id', $request->software_id);
        }
    }

    public function applySoftwareGroupByFilter($request)
    {
        if (isset($request->group_by) && $request->group_by == "softwares") {
            $this->query->orderBy('software_id', 'asc');
            $this->query = $this->query->join('softwares', 'patch_policy.software_id', '=', 'softwares.id');
            $this->query = $this->query->select('patch_id', DB::raw('group_concat(softwares.name) as softwares'), DB::raw('group_concat(patch_policy.id) as ids'))->groupBy('patch_id');
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
