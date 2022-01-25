<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskAssessment extends Model
{
    use HasFactory;

    public $rules =
        [
            'risk_assesment_id' => 'required | max:255',
            'title' => 'required | max:255',
        ];

    public function saveFormData($item, $request)
    {
        if (isset($request->title)) $item->title = $request->title;
        if (isset($request->risk_assesment_id)) $item->risk_assesment_id = $request->risk_assesment_id;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->participant)) $item->participant = $request->participant;
        if (isset($request->date_of_assesment)) $item->date_of_assesment = $request->date_of_assesment;
        if (isset($request->reason_of_assesment)) $item->reason_of_assesment = $request->reason_of_assesment;
        $item->save();

        return $item;
    }
}
