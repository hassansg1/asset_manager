<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PatchReportRepo
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
                    $this->query = $this->query->whereHas('software.vendor', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
                        return processQueryFiltersOnQuery($subQuery, $crOperation, $crWhere, $crValue);
                    });
                } else if ($crWhere == "software_name"
                    || $crWhere == "software_version"
                    || $crWhere == "software_description"
                ) {
                    $crWhere = str_replace('software_', '', $crWhere);
                    $this->query = $this->query->whereHas('software', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
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
            'vendor_name' => 'Vendor Name',
            'profile' => 'Vendor Profile',
            'contact' => 'Vendor Contact',
            'software_name' => 'Software Name',
            'software_version' => 'Software Version',
            'software_description' => 'Software Description',
            'name' => 'Patch Name',
            'description' => 'Patch Description',
            'release_date' => 'Patch Release Date',
            'is_required' => 'Patch Is Required',
            'is_critical' => 'Patch Is Critical',
        ];
    }
}
