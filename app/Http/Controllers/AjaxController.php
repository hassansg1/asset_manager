<?php

namespace App\Http\Controllers;

use App\Models\ClauseData;
use App\Models\ComplianceVersion;
use App\Models\ComplianceVersionItem;
use App\Models\Location;
use App\Models\Networks;
use App\Models\Port;
use App\Models\StandardClause;
use App\Models\SystemUserId;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\UserId;
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
        $ports = Port::where('location_id', $request->network_id)->get();
        return response()->json([
            'html' => view('ajax.ports_drop_down')->with(['ports' => $ports])->render(),
        ]);
    }

    public function getIPAddressOfNetwork(Request $request)
    {
        $usedIpAddress = Port::whereNotNull('ip_address')->where('network_id', $request->network_id)->pluck('ip_address')->toArray();
        $port = Port::find($request->network_id);
        $networkIpAddress = Networks::find($port->network_id);
        if (!$networkIpAddress) {
            return response()->json([
                'status' => false,
                'Message' => "No Network connected to the selected port"
            ]);
        }
        $from_digit = explode('.', $networkIpAddress->start_ip);
        $startingAddress = ($from_digit[0] ?? '') . "." . ($from_digit[1] ?? '') . "." . ($from_digit[2] ?? '');
        $from_digit = array_pop($from_digit);
        $to_digit = explode('.', $networkIpAddress->end_ip);
        $to_digit = array_pop($to_digit);

        return response()->json(
            [
                'html' => view('ajax.ip_address_drop_down')->with(
                    [
                        'data' => $networkIpAddress,
                        'start_ip' => $from_digit,
                        'end_ip' => $to_digit,
                        'startingAddress' => $startingAddress,
                        'ipAddress' => $request->ipAddress,
                        'usedIpAddress' => $usedIpAddress,
                    ]
                )->render()
            ]
        );
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
            $columns = array_diff($columns, ['created_at', 'updated_at']);

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
//        $input = explode('??', $request->item);
//        $class = 'App\Models\\' . $input[0];
//        $id = $input[1];
//
//        $childs = Parentable::where(['parentable_type' => $class, 'parentable_id' => $id])->count();
//        if ($childs == 0) {
//            Parentable::where(['childable_type' => $class, 'childable_id' => $id])->delete();
//            return response()->json([
//                'status' => true
//            ]);
//        }

        return response()->json([
            'status' => true
        ]);
    }

    public function system_user_accounts($id)
    {
        $system_user_id = SystemUserId::where('system_id', $id)->pluck("system_id", "user_id");
        return response()->json($system_user_id);
    }

    public function type_wise_assets($asset_id)
    {
        $assigned_user_accounts = UserAccount::pluck('account_id');
        $user_accounts = UserId::whereNotIn('id', $assigned_user_accounts)->where('parent_id', $asset_id)->pluck('user_id', 'id');
        return response()->json($user_accounts);
    }

    public function asset_wise_ip_address($asset_type)
    {
        $assets = Location::where('type', $asset_type)->pluck('rec_id', 'id');
        return response()->json($assets);
    }

    public function connected_asset_wise_ip_address($asset_type)
    {
        $assets = Location::where('type', $asset_type)->pluck('rec_id', 'id');
        return response()->json($assets);
    }

    public function system_wise_user_accounts($system_id)
    {
        $assigned_user_accounts = UserAccount::pluck('account_id');
        $user_accounts = UserId::whereNotIn('id', $assigned_user_accounts)->where('parent_id', $system_id)->pluck('user_id', 'id');
        return response()->json($user_accounts);
    }

    public function unit_wise_users($unit_id)
    {
        $users = User::where('unit_id', $unit_id)->pluck('first_name', 'id');
        return response()->json($users);
    }

    public function delete_assigned_user_id(Request $request, $user_id)
    {
        $user_account = UserAccount::where(['user_id' => $user_id, 'account_id' => $request->account_id])->delete();
        return true;
    }

    public function assigned_user_id(Request $request, $user_id)
    {
        $user_account = UserAccount::where(['account_id' => $request->account_id])->first();
        if ($user_account) {
            return 'ID Already Assigned';
        } else {
            $user_account = new UserAccount;
            $user_account->account_id = $request->account_id;
            $user_account->user_id = $user_id;
            $user_account->save();
            return 'ID Assigned';
        }
    }

    public function assigned_id_to_user(Request $request, $user_id)
    {
        $account_id = $request->account_id;
        foreach ($account_id as $key => $value) {
            $user_account = new UserAccount;
            $user_account->account_id = $value;
            $user_account->user_id = $user_id;
            $user_account->save();
        }
        return 'ID Assigned';
    }

    public function delete_assigned_id(Request $request, $account_id)
    {
        $user_account = UserAccount::where(['user_id' => $request->user_id, 'account_id' => $account_id])->delete();
        return true;
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
                        '\'' . $item->clause->number,
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

    public function showCompliancePopup(Request $request)
    {
        $compliance = ComplianceVersionItem::with('attachments.attachment.attachmentItems', 'clause', 'location', 'version')->where([
            'compliance_version_id' => $request->versionId,
            'clause_id' => $request->clauseId,
            'location_id' => $request->locationId,
        ])->first();

        $location = Location::find($request->locationId);
        $clause = StandardClause::find($request->clauseId);

        $html = view('version_compliance.partials.popup')->with(compact('compliance', 'request', 'location', 'clause'))->render();
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    public function approveStatus(Request $request)
    {
        dd($request->all());
    }

    public function getCommentIframe($id)
    {
        $comment = "";
        if ($id)
            $comment = ComplianceVersionItem::find($id)->comment ?? '';

        return view('iframe.comment')->with('comment', $comment);
    }
}
