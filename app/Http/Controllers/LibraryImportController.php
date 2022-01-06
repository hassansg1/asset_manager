<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Clause;
use App\Models\Standard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LibraryImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('import.index')->with(['action' => 'library_import.store']);
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
        $modelClass = Attachment::class;
        $tableNameRaw = 'attachments';
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
                            $arr[$clm] = sanitizeInput($obj[$header[$i]]);
                        }
                    }

                    $request = new Request();
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

        return view('import.index')->with(['status' => $success, 'logs' => $logs,'action' => 'library_import.store']);
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
