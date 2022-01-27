<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    use HasFactory;

    public $rules =
        [
            'risk_number' => 'required | max:255',
            'risk_assesment_id' => 'required | max:255',
            'risk_statement' => 'required | max:255',
        ];

    public function saveFormData($item, $request)
    {
        if (isset($request->risk_assesment_id)) $item->risk_assesment_id = $request->risk_assesment_id;
        if (isset($request->risk_number)) $item->risk_number = $request->risk_number;
        if (isset($request->risk_statement)) $item->risk_statement = $request->risk_statement;
        if (isset($request->risk_zone)) $item->risk_zone = $request->risk_zone;
        if (isset($request->threat_source)) $item->threat_source = $request->threat_source;
        if (isset($request->threat_action)) $item->threat_action = $request->threat_action;

        if (isset($request->vulnerability)) $item->vulnerability = $request->vulnerability;
        if (isset($request->consequence)) $item->consequence = $request->consequence;
        if (isset($request->impact)) $item->impact = $request->impact;
        if (isset($request->utl)) $item->utl = $request->utl;
        if (isset($request->unmitigated_risk)) $item->unmitigated_risk = $request->unmitigated_risk;
        if (isset($request->existing_countermeasures)) $item->existing_countermeasures = $request->existing_countermeasures;

        if (isset($request->mtl)) $item->mtl = $request->mtl;
        if (isset($request->mitigated_risk)) $item->mitigated_risk = $request->mitigated_risk;
        if (isset($request->recommendations)) $item->recommendations = $request->recommendations;
        if (isset($request->atl)) $item->atl = $request->atl;
        if (isset($request->residual_risk)) $item->residual_risk = $request->residual_risk;

        $item->save();

        return $item;
    }
}
