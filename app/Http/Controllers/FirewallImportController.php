<?php

namespace App\Http\Controllers;

use App\Models\Clause;
use App\Models\FirewallImport;
use App\Http\Controllers\Controller;
use App\Models\FirewallManagment;
use App\Models\Location;
use App\Models\NozomiData;
use App\Models\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class FirewallImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('import.index')->with(['action' => 'firewall_import.store']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('csv_file');
        $fileName = $file->getClientOriginalName();
        $name = rand(1000000, 10000000) . $fileName;
        $file->move(public_path('assets/files'), $name);

        $file = public_path('assets/files/' . $name);
        $csvContent = csvToArray($file);
        $header = $csvContent['header'];
        $data = $csvContent['data'];
        $modelClass = FirewallImport::class;
        $tableNameRaw = 'firewall_managments';
        $logs = [];
        $success = true;

        if ($modelClass) {
            $logs[] = 'File Validated successfully';
            $logs[] = '<br>';

            $count = 0;
            DB::beginTransaction();
            foreach ($data as $obj) {

                if ($success) {
                    $count++;
                    $logs[] = 'Precessing row no. ' . $count;
                    $model = App::make($modelClass);
                    $arr = [];
                    for ($i = 0; $i < count($obj); $i++) {
                        $clm = tableColumnsMapping($tableNameRaw, 'import', $header[$i]);
                        if ($clm) {
                            $arr[$clm] = $obj[$header[$i]];
                        }
                    }
                    $source_asset = Location::whereIn('rec_id',explode(',', $obj['Source Asset ID']))->pluck('id');
                    $arr['source_asset'] = json_encode($source_asset);

                    $destination_asset = Location::whereIn('rec_id',explode(',', $obj['Destination Asset ID']))->pluck('id');
                    $arr['destination_asset'] = json_encode($destination_asset);

                    $arr['approvel_expirey_date'] = Carbon::parse($arr['approvel_expirey_date'])->format('Y-m-d');
                    if ($arr['condition'] == '') {
                        $logs[] = 'Error : Policy Validity Should not  be Empty';
                        $success = false;
                        break;
                    }
                    $policyValidity = policyValidity();
                    if (!in_array($arr['condition'], $policyValidity)) {
                        $logs[] = 'Error : Policy Validity Should be temporary or permanent';
                        $success = false;
                        break;
                    }
                    if ($arr['condition'] == 'permanent'){
                        $arr['approvel_expirey_date'] = null;
                    }

                    $request = new Request();
                    $request->replace($arr);
                    $validator = Validator::make($request->all(), $model->rules);
                    if ($validator->fails()) {
                        $logs[] = 'Rolling back the changes.';
                        $success = false;
                        break;
                    } else {
                        try {
                            $model->saveFormData($model, $request);
                        } catch (\Exception $exception) {
                            $logs[] = 'Internal Error. Message  : ' . $exception->getMessage() . ' . Please contact the administer.';
                            $success = false;
                            break;
                        }
                        $logs[] = 'Saving row no. ' . $count;
                        $logs[] = 'Data saved.';
                    }
                } else
                    break;
                $logs[] = '<br>';
            }
            if ($success) {
                $logs[] = '<br>';
                $logs[] = 'All the Data processed successfully.';
                DB::commit();
            } else {
                $logs[] = '<br>';
                $logs[] = 'Changes are rolled back.';
                $success = false;
                DB::rollBack();
            }

        } else {
            $success = false;
            $logs[] = 'Invalid file name';
        }

        return view('import.index')->with(['status' => $success, 'logs' => $logs,'action' => 'firewall_import.store']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FirewallImport  $firewallImport
     * @return \Illuminate\Http\Response
     */
    public function show(FirewallImport $firewallImport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FirewallImport  $firewallImport
     * @return \Illuminate\Http\Response
     */
    public function edit(FirewallImport $firewallImport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FirewallImport  $firewallImport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FirewallImport $firewallImport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FirewallImport  $firewallImport
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirewallImport $firewallImport)
    {
        //
    }
}
