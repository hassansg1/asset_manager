<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RiskManagementRepo
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
                if ($crWhere == "risk_assesment_id"
                    || $crWhere == "risk_assesment_title"
                    || $crWhere == "risk_assesment_date"
                    || $crWhere == "risk_assesment_description"
                    || $crWhere == "participants"
                    || $crWhere == "reason_of_assessment"
                ) {
                    $this->query = $this->query->whereHas('risk_assessment', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
                        $subQuery = processQueryFiltersOnQuery($subQuery, $crOperation, $crWhere, $crValue);
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
            'risk_assesment_id' => 'Risk Assessment ID',
            'risk_assesment_title' => 'Risk Assessment Title',
            'risk_assesment_description' => 'Risk Assessment Description',
            'risk_assesment_date' => 'Risk Assessment Date',
            'participants' => 'Participants',
            'reason_of_assessment' => 'Reason of Assessment',
            'risk_number' => 'Risk Number',
            'risk_statement' => 'Risk Statement',
            'risk_zone' => 'Threat Zone',
            'threat_source' => 'Threat Source',
            'threat_action' => 'Threat Action',
            'vulnerability' => 'Threat Vulnerabilities',
            'consequence' => 'Consequences',
            'impact' => 'Impact',
            'utl' => 'UTL',
            'unmitigated_risk' => 'Unmitigated Risk',
            'existing_countermeasures' => 'Existing Countermeasures',
            'mtl' => 'MTL',
            'mitigated_risk' => 'Mitigated Risk',
            'recommendations' => 'Recommendations',
            'atl' => 'ATL',
            'residual_risk' => 'Residual Risk',
        ];
    }
}
