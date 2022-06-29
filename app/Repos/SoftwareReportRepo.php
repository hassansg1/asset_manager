<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SoftwareReportRepo
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
                    $this->query = $this->query->whereHas('vendor', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
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
            'name' => 'Software Name',
            'version' => 'Software Version',
            'description' => 'Software Description',
            'approval_required' => 'Patch/AV Approval Required',
            'function' => 'Software Family',
        ];
    }
}
