<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Clause;
use App\Models\Standard;
use App\View\Components\breadcrumb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class ClauseImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('import.index')->with(['action' => 'clause_import.store']);
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
        $modelClass = Clause::class;
        $tableNameRaw = 'clauses';
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

                    $standardName = reset($obj);

                    if ($standardName == '' || !$standardName) {
                        $logs[] = 'Error : Standard Cannot be Empty';
                        $success = false;
                        break;
                    }

                    $standard = Standard::where('name', $standardName)->first();
                    if (!$standard) {
                        $logs[] = 'Error : Standard not found : ' . $standardName;
                        $success = false;
                        break;
                    }

                    $arr['standard_id'] = $standard->id;
                    $request = new Request();
                    $request->replace($arr);
                    $validator = Validator::make($request->all(), $model->rules($arr['standard_id']));
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

        return view('import.index')->with(['status' => $success, 'logs' => $logs,'action' => 'clause_import.store']);
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
