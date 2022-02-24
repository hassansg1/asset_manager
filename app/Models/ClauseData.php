<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClauseData extends Model
{
    use HasFactory;

    protected $guarded = [];

    const APPLICABLE_YES = 1;
    const APPLICABLE_NO = 2;

    const COMPLIANT_ALL = 0;
    const COMPLIANT_YES = 1;
    const COMPLIANT_NO = 2;
    const COMPLIANT_UNDER_PROCESS = 3;
    const COMPLIANT_NOT_EVALUATED = 4;
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

    public function clause()
    {
        return $this->belongsTo(Clause::class, 'clause_id');
    }

    public static $repo = 'ClauseDataRepo';

    public static function saveFormData($request)
    {
        $found = ClauseData::where('clause_id', '=', $request->clause_id)->first();
        $clause = Clause::find($request->clause_id);

        if ($found != null) {
            if (isset($request->clause_id)) $found->clause_id = $request->clause_id;
            if ($request->has('column_name') && isset($request->column_name)) $found[$request->column_name] = $request->value;
            $found->save();
        } else {
            $obj = new ClauseData();
            if (isset($request->clause_id)) $obj->clause_id = $request->clause_id;
            if ($request->has('column_name') && isset($request->column_name)) $obj[$request->column_name] = $request->value;
            $obj->standard_id = $clause->standard_id;
            $obj->save();
            $found = $obj;
        }
        if (isset($request->column_name) && $request->column_name == 'applicable') {
            $parents = [];
            $clause = $found->clause;
            while ($clause->parent) {
                $parents[] = $clause->parent->id;

                $nextObj = ClauseData::where('clause_id', '=', $clause->parent->id)->where('user_id', '=', Auth::id())->first();
                if ($nextObj) {
                    $nextObj->applicable = $request->value;
                    $nextObj->save();
                } else {
                    $nextObj = new ClauseData();
                    $nextObj->applicable = $request->value;
                    $nextObj->clause_id = $clause->parent->id;
                    $nextObj->standard_id = $clause->standard_id;
                    $nextObj->save();
                }
                $clause = $clause->parent;
            }
            return ['parents' => $parents];
        }
    }
}
