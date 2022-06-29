<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InstalledPatchReportRepo
{
    public $query;

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function filter($query, $request)
    {
        $this->query = $query;
        $this->applyWhereFilter($request);
        return $this->query;
    }

    public function applyWhereFilter($request)
    {
        $where = $request->where;
        $operation = $request->op;
        $value = $request->val;
        if (isset($request->where)) {
            for ($index = 0; $index < count($request->where); $index++) {
                $crWhere = $where[$index];
                $crOperation = $operation[$index];
                $crValue = $value[$index];
                if ($crWhere == "vendor_name"
                    || $crWhere == "profile"
                    || $crWhere == "contact"
                ) {
                    if ($crWhere == "vendor_name") $crWhere = "name";
                    $this->query = $this->query->whereHas('patch.software.vendor', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
                        return processQueryFiltersOnQuery($subQuery, $crOperation, $crWhere, $crValue);
                    });
                } else if ($crWhere == "patch_name"
                    || $crWhere == "patch_description"
                    || $crWhere == "patch_release_date"
                ) {
                    $crWhere = str_replace('patch_', '', $crWhere);
                    $this->query = $this->query->whereHas('patch', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
                        return processQueryFiltersOnQuery($subQuery, $crOperation, $crWhere, $crValue);
                    });
                } else if ($crWhere == "software_name"
                    || $crWhere == "software_version"
                    || $crWhere == "software_description"
                ) {
                    $crWhere = str_replace('software_', '', $crWhere);
                    $this->query = $this->query->whereHas('patch.software', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
                        return processQueryFiltersOnQuery($subQuery, $crOperation, $crWhere, $crValue);
                    });
                } else {
                    if ($crWhere && $crValue) {
                        $this->query = processQueryFiltersOnQuery($this->query, $crOperation, $crWhere, $crValue);
                    }
                }
            }
        }

    }

    public function getColumns()
    {
        return [
            'asset_id' => 'Asset ID',
            'vendor_name' => 'Vendor Name',
            'profile' => 'Vendor Profile',
            'contact' => 'Vendor Contact',
            'software_name' => 'Software Name',
            'software_version' => 'Software Version',
            'software_description' => 'Software Description',
            'patch_name' => 'Patch Name',
            'patch_description' => 'Patch Description',
            'patch_release_date' => 'Patch Release Date',
            'patch_is_required' => 'Patch Is Required',
            'patch_is_critical' => 'Patch Is Critical',
        ];
    }
}
