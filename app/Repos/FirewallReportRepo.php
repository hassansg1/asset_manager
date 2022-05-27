<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FirewallReportRepo
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
                if ($crWhere && $crValue) {
                    $this->query = processQueryFiltersOnQuery($this->query, $crOperation, $crWhere, $crValue);
                }
            }
        }

    }

    public function getColumns()
    {
        return [
            'source_location' => 'Source Location',
            'source_zone' => 'Source Zone',
            'source_asset' => 'Source Assets',
            'destination_location' => 'Destination Location',
            'destination_zone' => 'Destination Zone',
            'destination_asset' => 'Destination Assets',
            'applicatin_port' => 'Application / Port',
            'description' => 'Justification',
            'approvel_expirey_date' => 'Policy Validity Date',
            'approved_by' => 'Policy Approved By',
        ];
    }
}
