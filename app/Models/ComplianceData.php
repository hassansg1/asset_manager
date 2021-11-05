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
        ///// This CHECK WRITE BECAUSE DID NOT Forcefully Inject In DataBase
        if ($request->has('column_name') && ($request->column_name == 'applicable' || $request->column_name == 'reason' || $request->column_name == 'compliant' ) )   
        {
            if($found !=null)
            {
                if (isset($request->compliance_id)) $found->compliance_id = $request->compliance_id;
                if ($request->has('column_name') && isset($request->column_name)) $found[$request->column_name] = $request->value;
                $found->save();
            }
            else
            {   
                $obj = new ComplianceData();
                if (isset($request->compliance_id)) $obj->compliance_id = $request->compliance_id;
                if ($request->has('column_name') && isset($request->column_name)) $obj[$request->column_name] = $request->value;
                $obj->user_id = Auth::id();
                $obj->save();
            }
        }

    }
    public function compliance(){
        return $this->belongsTo(Compliance::class,'compliance_id');
    }
}
