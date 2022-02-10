<?php

namespace App\Http\Controllers;

use App\Models\FirewallImport;
use App\Models\NozomiData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class NozomiImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('import.index')->with(['action' => 'nozomi_import.store']);
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
     * @param \Illuminate\Http\Request $request
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
        $modelClass = NozomiData::class;
        $tableNameRaw = 'nozomi_data';
        $logs = [];
        $success = true;

        if ($modelClass) {
            $logs[] = 'File Validated successfully';
            $logs[] = '<br>';

            $count = 0;
            DB::beginTransaction();
            foreach ($data as $obj) {
                $count++;
                $logs[] = 'Precessing row no. ' . $count;
                $model = App::make($modelClass);
                $arr = [];
                for ($i = 0; $i < count($obj); $i++) {
                    $map = [
                        'ip' => 'ip_address',
                        'os' => 'operating_system',
                        'vendor' => 'make_vendor',
                    ];
                    $clm = $map[$header[$i]] ?? null;
                    if ($clm) $arr[$clm] = sanitizeInput($obj[$header[$i]]);
                    else $arr[$header[$i]] = sanitizeInput($obj[$header[$i]]);
                }
                $ipAddress = $arr['ip_address'];
                $ipAddresses = explode(',', $ipAddress);
                foreach ($ipAddresses as $ipAddress) {
                    NozomiData::create([
                        'ip_address' => $ipAddress,
                        'data' => json_encode($arr)
                    ]);
                }
                $logs[] = 'Saving row no. ' . $count;
                $logs[] = 'Data saved.';
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

        return view('import.index')->with(['status' => $success, 'logs' => $logs, 'action' => 'nozomi_import.store']);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FirewallImport $firewallImport
     * @return \Illuminate\Http\Response
     */
    public function show(FirewallImport $firewallImport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FirewallImport $firewallImport
     * @return \Illuminate\Http\Response
     */
    public function edit(FirewallImport $firewallImport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FirewallImport $firewallImport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FirewallImport $firewallImport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FirewallImport $firewallImport
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirewallImport $firewallImport)
    {
        //
    }
}
