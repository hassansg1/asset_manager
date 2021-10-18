<?php

namespace App\Http\Controllers;

use App\Models\NetworkAsset;
use App\Models\Parentable;
use App\Models\Port;
use Illuminate\Http\Request;
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

    public function test()
    {
        $tables = ['companies', 'units', 'sites', 'sub_sites', 'buildings', 'rooms', 'cabinets', 'networks_list', 'network_assets', 'computer_assets', 'lone_assets'];

        foreach ($tables as $table) {
            $columns = ['parent_type', 'parent_name'];
            $columns = array_merge($columns, DB::getSchemaBuilder()->getColumnListing($table));
            $columns = array_diff($columns, ['created_at', 'updated_at', 'rec_id']);

            $path = public_path('csv/' . $table . '.csv');

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


        dd("As");
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
}
