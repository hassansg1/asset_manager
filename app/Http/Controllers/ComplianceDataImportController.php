<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Clause;
use App\Models\ClauseData;
use App\Models\ComplianceVersion;
use App\Models\ComplianceVersionItem;
use App\Models\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ComplianceDataImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('import.index')->with(['action' => 'compliance_data_import.store']);
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
        $modelClass = ComplianceVersionItem::class;
        $tableNameRaw = 'compliance_version_items';
        $logs = [];
        $success = true;

        if ($modelClass) {
            $logs[] = 'File Validated successfully';
            $logs[] = '<br>';

            $count = 0;
            foreach ($data as $obj) {
                if ($success) {
                    $count++;
                    $logs[] = 'Precessing row no. ' . $count;
                    $version = ComplianceVersion::where('name', $obj['Version'])->first();
                    $clause = Clause::where('number', substr($obj['Clause Number'], 1, strlen($obj['Clause Number']) - 1))->first();
                    if ($clause) {
                        $clauseData = ClauseData::where(['clause_id' => $clause->id, 'standard_id' => $version->standard_id])->first();
                        $parentModel = App::make('App\Models\\' . $obj['Location Type']);
                        $parent = $parentModel->where('long_name', $obj['Location Name'])->first();

                        if ($version && $clause && $clauseData && $parentModel && $parent) {
                            ComplianceVersionItem::create([
                                'compliance_version_id' => $version->id,
                                'compliance_data_id' => $clauseData->id,
                                'location_id' => $parent->id,
                                'compliant' => $obj['Compliant'],
                                'comment' => $obj['Comment'],
                                'link' => $obj['Url'],
                            ]);
                        }
                    }
                } else
                    break;
                $logs[] = '<br>';
            }
        }

        return view('import.index')->with(['status' => $success, 'logs' => $logs, 'action' => 'compliance_data_import.store']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
