<?php

namespace App\Http\Controllers;

use App\Models\AssetFunction;
use App\Models\ClauseData;
use App\Models\ComplianceVersionItem;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index(Request $request){
        $compliances = ComplianceVersionItem::all();
        foreach ($compliances as $compliance)
        {
            $complianceData = ClauseData::find($compliance->clause_id);
            if($complianceData)
            {
                $compliance->clause_id = $complianceData->clause_id;
                $compliance->save();
            }
        }
//       $items =  ClauseData::with('compliance')->where('user_id',Auth::id())->orderBy('id','desc')->get();
//        Location::fixTree();
//        $compliant = [];
//        $complianceData = ComplianceVersionItem::get();
//        foreach ($complianceData as $data)
//        {
//            if( $data['compliant']!= "" &&  !isset($compliant[$data['compliant']])) $compliant[$data['compliant']] = 0;
//            if($data['compliant'] == "") $data['compliant'] = "No";
//            $compliant[$data['compliant']] = $compliant[$data['compliant']] + 1;
//        }
//        if (!empty($compliant)){
//            $values[] = $compliant['Yes'];
//            $values[] = $compliant['No'];
//            $values[] = $compliant['Partial'];
//            $values[] = $compliant['Not evaluated'];
//        }

        $computer_assets =  Location::where('type','computer_assets')->count();
        $lone_assets = Location::where('type','lone_assets')->count();
        $network_assets = Location::where('type','network_assets')->count();
        $asset_functions = AssetFunction::select('id','name')->get();
//        dd($asset_functions);
//        $asse_functions_name = [];
//        foreach($asset_functions as $subchild) {
//            $asse_functions_name[] = $subchild->name;
//        }

        return view('dashboard.index')->with(['values' => $values ?? [], 'computer_assets' => $computer_assets, 'lone_assets' => $lone_assets, 'network_assets' => $network_assets, 'asset_functions' =>$asset_functions]);

    }
}
