<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Patch;
use App\Models\Software;
use App\Models\SoftwareComponent;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PatchImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('import.index')->with(['action' => 'patch_import.store']);
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
        $data = $csvContent['data'];
        $modelClass = Software::class;
        $logs = [];
        $success = true;

        $logs[] = 'File Validated successfully';
        $logs[] = '<br>';

        $count = 0;
        DB::beginTransaction();
        foreach ($data as $obj) {
            if ($success) {
                $count++;
                $logs[] = 'Precessing row no. ' . $count;

                $softwareName = reset($obj);
                $software = Software::where('name', $softwareName)->first();
                if (!$software) {
                    $logs[] = 'Software Not Found. : ' . $softwareName;
                    $logs[] = 'Rolling back the changes.';
                    $success = false;
                    break;
                }
                $request = new Request();
                $model = new Patch();
                $patchName = trim($obj['Patch Name']);
                $patch = Patch::where('name', $patchName)->first();
                if (!$patch) {
                    $arr = [
                        'name' => $patchName,
                        'software_id' => $software->id,
                        'article' => $obj['Article'],
                        'build_number' => $obj['Build Number'],
                        'details' => $obj['Details'],
                        'release_date' => $obj['Patch Release Date'],
                    ];
                    $request->replace($arr);
                    $validator = Validator::make($request->all(), $model->rules);
                    if ($validator->fails()) {
                        foreach ($validator->errors()->all() as $error) {
                            $logs[] = 'Error : ' . rec_id_replacer($error);
                            $logs[] = json_encode($arr);
                            $success = false;
                        }
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
                        $logs[] = 'Software Component Data saved.';
                    }
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

        return view('import.index')->with(['status' => $success, 'logs' => $logs, 'action' => 'patch_import.store']);
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
