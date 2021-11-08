<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\ComplianceDataLocation;

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
///..... Locations
    const COMPANIES = 1;
    const UNITS = 2;
    const SITES = 3;
    const SUBSITES = 4;
    const BUILDINGS = 5;
    const ROOMS = 6;
    const CABINETS = 7;
    const ASSETS = 8;
///..........
///........ Criteria
    const AUTOMATIC = 1;
    const MANUAL = 2;
//..............
                    
    public function compliance(){
        return $this->belongsTo(Compliance::class,'compliance_id');
    }

    public static function saveFormData($request)
    {
        $found = ComplianceData::where('compliance_id','=',$request->compliance_id)->where('user_id','=',Auth::id())->first();

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

    public static function saveLocations($request)
    {
        $found = ComplianceDataLocation::where('compliance_data_id',$request->compliance_data_id)->get();   
        if(count($found)>0)
        {
            $found->each->delete();
        }
        foreach($request->value as $loop_var)
        {
            $obj = new ComplianceDataLocation();
            $obj->compliance_data_id = $request->compliance_data_id;
            $obj->location = $loop_var;
            $obj->save();
        }
    }

}
