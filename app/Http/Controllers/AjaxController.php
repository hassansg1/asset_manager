<?php

namespace App\Http\Controllers;

use App\Models\ClauseData;
use App\Models\ComplianceVersion;
use App\Models\LoneAsset;
use App\Models\NetworkAsset;
use App\Models\Location;
use App\Models\AssetUserId;
use App\Models\UserId;
use App\Models\Parentable;
use App\Models\Port;
use App\Models\SystemUserId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //

    public function getNewAjaxRow(Request $request)
    {
        return response()->json(
            [
                'html' => view($request->type . '.partials.tabs.port_row')->with('port', $request)->render()
            ]
        );
    }

    public function getNewAjaxForm(Request $request)
    {

        $modal = isset($request->modal) ? $request->modal : '';
        return response()->json(
            [
                'html' => view($request->type . '.partials.tabs.modal_row')->with(['modal' => $modal])->render()
            ]
        );
    }

    public function getPortsOfNetwork(Request $request)
    {
        $ports = Port::where('portable_type', NetworkAsset::class)->where('portable_id', $request->network_id)->get();
        return response()->json([
            'html' => view('ajax.ports_drop_down')->with(['ports' => $ports])->render()
        ]);
    }

    public function exportDataTemplates()
    {
        $tables = ['units', 'sites', 'sub_sites', 'buildings', 'rooms', 'cabinets', 'network_assets', 'computer_assets', 'lone_assets', 'attachments'];

        foreach ($tables as $table) {
            $columns = tableColumnsMapping($table, 'export');
            $path = public_path('csv/' . tableNamesMapping($table, 'export') . '.csv');

            $file = fopen($path, 'w');
            fputcsv($file, $columns);
            fclose($file);
        }
        $tables = ['ports'];

        foreach ($tables as $table) {
            $columns = ['parent_type', 'parent_name'];
            $columns = array_merge($columns, DB::getSchemaBuilder()->getColumnListing($table));
            $columns = array_diff($columns, ['created_at', 'updated_at', 'portable_type', 'portable_id', 'id']);

            $path = public_path('csv/' . $table . '.csv');

            $file = fopen($path, 'w');
            fputcsv($file, $columns);
            fclose($file);
        }

        flashSuccess("Successfully generated");
        return redirect()->back();
    }

    public function checkDeleteCriteria(Request $request)
    {
        $input = explode('??', $request->item);
        $class = 'App\Models\\' . $input[0];
        $id = $input[1];

        $childs = Parentable::where(['parentable_type' => $class, 'parentable_id' => $id])->count();
        if ($childs == 0) {
            Parentable::where(['childable_type' => $class, 'childable_id' => $id])->delete();
            return response()->json([
                'status' => true
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }

    public function system_user_accounts($id){
        $system_user_id = SystemUserId::where('system_id', $id)->pluck("system_id","user_id");
        return response()->json($system_user_id);
    }

    public function type_wise_assets($asset_id){
        $user_accounts = UserId::where('parent_id', $asset_id)->pluck('user_id', 'id');
        return response()->json($user_accounts);
    }
    public  function asset_wise_ip_address($asset_type){
        $assets = Location::where('type', $asset_type)->pluck('rec_id', 'id');
        return response()->json($assets);
    }
    public  function connected_asset_wise_ip_address($asset_type){
        $assets = Location::where('type', $asset_type)->pluck('rec_id', 'id');
        return response()->json($assets);
    }

    public function system_wise_user_accounts($system_id){
        $user_accounts = UserId::where('parent_id', $system_id)->pluck('user_id', 'id');
        return response()->json($user_accounts);
    }

    function exportComplianceDataTemplates()
    {
        $columns = [
            'Version',
            'Clause Number',
            'Clause Title',
            'Clause Description',
            'Location Type',
            'Location Name',
            'Compliant',
            'Comment',
            'Url',
        ];

        $complianceVersion = ComplianceVersion::all();
        foreach ($complianceVersion as $version) {
            $path = public_path('csv/' . $version->name . '.csv');

            $file = fopen($path, 'w');
            fputcsv($file, $columns);

            $data = ClauseData::where('applicable', 1)->where('standard_id', $version->standard_id)->get();

            foreach ($data as $item) {
                $locations = App::make('App\Models\\' . $item->location)->get();
                foreach ($locations as $location) {
                    $row = [
                        $version->name,
                        '\''.$item->clause->number,
                        $item->clause->title,
                        $item->clause->description,
                        $item->location,
                        $location->show_name,
                        '',
                        '',
                    ];
                    fputcsv($file, $row);
                }
            }
            fclose($file);
        }


        dd("Success");
    }
}
