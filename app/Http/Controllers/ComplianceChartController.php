<?php

namespace App\Http\Controllers;

use App\Models\AssetFunction;
use App\Models\ClauseData;
use App\Models\ComplianceVersion;
use App\Models\Location;
use App\Models\StandardClause;
use Illuminate\Http\Request;

class ComplianceChartController extends Controller
{
    //
    public function render(Request $request)
    {
        $versionId = $request->versionId ?? 4;
        $locationInput = $request->locationId ?? null;
        $parentClauseId = $request->parentClauseId ?? null;

        $totalClauses = 0;
        $version = ComplianceVersion::find($versionId);
        $clauses = StandardClause::with('descendants');
        if ($parentClauseId) {
            $clauses->where('parent_id', $parentClauseId);
        } else {
            $clauses->where('parent_id', null);
        }
        $clauses = $clauses->where('standard_id',$version->standard_id);
        $clauses = $clauses->get();
        $data = [];
        for ($x = 0; $x < 10; $x++) {
            $label = ClauseData::getLabel($x);
            if ($label != "Unknown")
                $data[$label] = 0;
        }
        $locationTypes = [];
        if ($locationInput) {
            $locationsModels = Location::whereIn('id', $locationInput)->get();
            foreach ($locationsModels as $locationsModel)
                $locationTypes[] = Location::getTypeToModel($locationsModel->type);
        }

        foreach ($clauses as $clause) {
            if ($clause->isApplicable() && $clause->isApplicableOnLocationType($locationTypes)) {
                $clauseNumbers = [];
                $total = 0;
                for ($x = 0; $x < 10; $x++) {
                    $label = ClauseData::getLabel($x);
                    if ($label != "Unknown")
                        $clauseNumbers[$label] = 0;
                }
                $allClauses = $clause->descendants;
                $allClauses->push($clause);
                foreach ($allClauses as $descendant) {
                    if ($descendant->applicable && $descendant->isApplicableOnLocationType($locationTypes)) {
                        $applicability = $descendant->location;
                        if ($applicability) {
                            $locationModel = 'App\Models\\' . $applicability;
                            $locations = $locationModel::pluck('id')->toArray();
                            if (isset($locationInput))
                                $locations = $locationInput;
                            foreach ($locations as $location) {
                                $compliance = getComplianceVersionItem($versionId, $descendant->id, $location);
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
                $totalClauses += 1;
                $clause->notShow = 0;
            } else
                $clause->notShow = 1;
        }

        $table = view('chart.compliance_chart.table')->with(['clauses' => $clauses, 'version' => $version, 'totalClauses' => $totalClauses])->render();

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

    public function  assets_chart()
    {
        $data = [];
        foreach (Location::assetTypes() as $key => $value) {
            $data[$value]= Location::where('type', $value)->count();
        }
        $assetChartArray = [];
        foreach ($data as $type => $count) {
            array_push($assetChartArray, (object)['value' => $count, 'name' => $type . "($count)"]);
        }
        return response()->json([
            'status' => true,
            'data' => $assetChartArray,
        ]);
    }

    public function  assets_functions_chart()
    {
        $data = [];
        $assetFunctions = AssetFunction::get();
        foreach ($assetFunctions as $key => $value) {
            $data[$value->name]= Location::where('function', $value->id)->count();
        }
        $assetFunctionChartArray = [];
        foreach ($data as $assetFunction => $count) {
            array_push($assetFunctionChartArray, (object)['value' => $count, 'name' => $assetFunction . "('Assets'$count)"]);
        }
        return response()->json([
            'status' => true,
            'data' => $assetFunctionChartArray,
        ]);
    }
}
