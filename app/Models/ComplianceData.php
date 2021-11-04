<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class ComplianceData extends Model
{
    use HasFactory;

    protected $guarded = [];


    const APPLICABLE_YES = 1;
    const APPLICABLE_NO = 2;
    const COMPLIANT_ALL = 0;
    const COMPLIANT_YES = 1;
    const COMPLIANT_NO = 2;
    const COMPLIANT_UNDEP_ROCESS = 3;
    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public static function saveFormData($request)
    {
        $found = ComplianceData::where('compliance_id','=',$request->compliance_id)->where('user_id','=',Auth::id())->first();
        if($found !=null)
        {
            if (isset($request->compliance_id)) $found->compliance_id = $request->compliance_id;
            if($request->has('column_name') && ($request->column_name == 'applicable' || $request->column_name == "applicable"))
            {
                if (isset($request->column_name)) $found->applicable = $request->value;

            }
            if($request->has('column_name') && ($request->column_name == 'compliant' || $request->column_name == "compliant"))
            {
                if (isset($request->column_name)) $found->compliant = $request->value;
            }
            if (isset($request->reason)) $found->reason = $request->reason;
            $found->save();
        }
        else
        {   
            $obj = new ComplianceData();
            if (isset($request->compliance_id)) $obj->compliance_id = $request->compliance_id;
            if($request->has('column_name') && ($request->column_name == 'applicable' || $request->column_name == "applicable"))
            {
                if (isset($request->column_name)) $obj->applicable = $request->value;
            }
            if($request->has('column_name') && ($request->column_name == 'compliant' || $request->column_name == "compliant"))
            {
                if (isset($request->column_name)) $obj->compliant = $request->value;
            }
            if (isset($request->reason)) $obj->reason = $request->reason;
            $obj->user_id = Auth::id();
            $obj->save();

        }


    }
}
