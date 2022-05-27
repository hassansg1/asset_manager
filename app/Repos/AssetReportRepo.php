<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AssetReportRepo
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
                if ($crWhere == "asset_function") {
                    $crWhere = "name";
                    $this->query->whereHas('assetFunction', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
                        $subQuery = processQueryFiltersOnQuery($subQuery, $crOperation, $crWhere, $crValue);
                    });
                }
                else if ($crWhere == "operating_system") {
                    $crWhere = "name";
                    $this->query->whereHas('operatingSystem', function ($subQuery) use ($crOperation, $crWhere, $crValue) {
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
            'parent' => 'Asset Hierarchy',
            'rec_id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'asset_function' => 'Asset Function',
            'asset_make' => 'Asset Make',
            'model' => 'Asset Model',
            'port_number' => 'Port Number',
            'serial_number' => 'Serial Number',
            'comments' => 'Comments',
            'asset_security_zone' => 'Asset Security Zone',
            'vm_host' => 'VM Host',
            'operating_system' => 'Operating System',
            'asset_firmware' => 'Asset Firmware',
            'connected_scada_server' => 'Connected SCADA Server',
            'hardware_legacy' => 'Hardware Legacy',
            'software_legacy' => 'Software Legacy',
            'single_point_of_failure' => 'Single Point of Failure',
            'criticality' => 'Criticality',
            'contact' => 'Owner Contact',
        ];
    }
}
