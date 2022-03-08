<?php

namespace App\Http\Controllers;

use App\Models\ClauseData;
use App\Models\ComplianceVersion;
use App\Models\StandardClause;
use Illuminate\Http\Request;

class ComplianceChartController extends Controller
{
    //
    public function render(Request $request)
    {
        $versionId = $request->versionId ?? 4;
        $parentClauseId = $request->parentClauseId ?? null;

        $version = ComplianceVersion::find($versionId);
        $clauses = StandardClause::with('descendants');
        if ($parentClauseId) {
            $clauses->where('parent_id', $parentClauseId)->where('applicable', 1);
        } else {
            $clauses->where('parent_id', null)->whereHas('descendants', function ($query) {
                $query->where('applicable', 1);
            });
        }


        $clauses = $clauses->get();
        $data = [];
        for ($x = 0; $x < 10; $x++) {
            $label = ClauseData::getLabel($x);
            if ($label != "Unknown")
                $data[$label] = 0;
        }

        foreach ($clauses as $clause) {
            $clauseNumbers = [];
            $total = 0;
            for ($x = 0; $x < 10; $x++) {
                $label = ClauseData::getLabel($x);
                if ($label != "Unknown")
                    $clauseNumbers[$label] = 0;
            }
            if ($clause->applicable) {
                $applicability = $clause->location;
                if ($applicability) {
                    $locationModel = 'App\Models\\' . $applicability;
                    $locations = $locationModel::get();
                    foreach ($locations as $location) {
                        $compliance = getComplianceVersionItem($versionId, $clause->id, $location->id);
                        $complianceLabel = ClauseData::getLabel($compliance);
                        if (!isset($data[$complianceLabel])) $data[$complianceLabel] = 1;
                        else $data[$complianceLabel] = $data[$complianceLabel] + 1;
                        if (!isset($clauseNumbers[$complianceLabel])) $clauseNumbers[$complianceLabel] = 1;
                        else $clauseNumbers[$complianceLabel] = $clauseNumbers[$complianceLabel] + 1;
                        $total += 1;
                    }
                }
            }
            foreach ($clause->descendants as $descendant) {
                if ($descendant->applicable) {
                    $applicability = $descendant->location;
                    if ($applicability) {
                        $locationModel = 'App\Models\\' . $applicability;
                        $locations = $locationModel::get();
                        foreach ($locations as $location) {
                            $compliance = getComplianceVersionItem($versionId, $descendant->id, $location->id);
                            $complianceLabel = ClauseData::getLabel($compliance);
                            if (!isset($data[$complianceLabel])) $data[$complianceLabel] = 1;
                            else $data[$complianceLabel] = $data[$complianceLabel] + 1;
                            if (!isset($clauseNumbers[$complianceLabel])) $clauseNumbers[$complianceLabel] = 1;
                            else $clauseNumbers[$complianceLabel] = $clauseNumbers[$complianceLabel] + 1;
                            $total += 1;
                        }
                    }
                }
            }
            $clause->clauseNumbers = $clauseNumbers;
            $clause->totalNumber = $total;
        }

        $table = view('chart.compliance_chart.table')->with(['clauses' => $clauses, 'version' => $version])->render();

        $returnObj = [];
        foreach ($data as $label => $count) {
            array_push($returnObj, (object)['value' => $count, 'name' => $label . "($count)"]);
        }

        return response()->json([
            'status' => true,
            'data' => $returnObj,
            'table' => $table
        ]);
    }
}
