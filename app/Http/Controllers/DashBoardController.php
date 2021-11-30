<?php

namespace App\Http\Controllers;

use App\Models\ClauseData;
use App\Models\ComplianceVersionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index(){
//       $items =  ClauseData::with('compliance')->where('user_id',Auth::id())->orderBy('id','desc')->get();

        $compliant = [];
        $complianceData = ComplianceVersionItem::get();
        foreach ($complianceData as $data)
        {
            if( $data['compliant']!= "" &&  !isset($compliant[$data['compliant']])) $compliant[$data['compliant']] = 0;
            if($data['compliant'] == "") $data['compliant'] = "No";
            $compliant[$data['compliant']] = $compliant[$data['compliant']] + 1;
        }
        $values[] = $compliant['Yes'];
        $values[] = $compliant['No'];
        $values[] = $compliant['Partial'];
        $values[] = $compliant['Not evaluated'];


        return view('dashboard.index')->with(['values' => $values]);

    }
}
