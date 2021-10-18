<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\View\Components\breadcrumb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('import.index');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('csv_file');
        $fileName = $file->getClientOriginalName();
        $name = rand(1000000, 10000000) . $fileName;
        $file->move(public_path('files'), $name);

        $file = public_path('files/' . $name);

        $csvContent = $this->csvToArray($file);
        $header = $csvContent['header'];
        $data = $csvContent['data'];
        $tableName = explode('.', $fileName)[0];
        $modelClass = config('models.' . $tableName);
        $logs = [];
        $success = true;

        if ($modelClass) {
            $logs[] = 'File Validated successfully';
            $logs[] = '<br>';
            $columns = Schema::getColumnListing($tableName);

            $count = 0;
            DB::beginTransaction();
            foreach ($data as $obj) {
                if ($success) {
                    $count++;
                    $logs[] = 'Precessing row no. ' . $count;
                    $model = App::make($modelClass);
                    $arr = [];
                    for ($i = 0; $i < count($obj); $i++) {
                        if ($header[$i] == 'id') {
                            $arr['rec_id'] = $obj[$header[$i]];
                        } else {
                            if (in_array($header[$i], $columns)) {
                                $arr[$header[$i]] = $obj[$header[$i]];
                            }
                        }
                    }

                    $parentType = $obj['parent_type'];
                    $parentId = $obj['parent_name'];

                    if (!in_array($parentType, ['Company', 'Unit', 'Site', 'SubSite', 'Unit', 'Building', 'Room', 'Cabinet'])) {
                        $logs[] = 'Error : Invalid Parent Type : '.$parentType;
                        $success = false;
                        break;
                    }
                    if ($parentId == '' || !$parentType) {
                        $logs[] = 'Error : Parent Id cannot be empty';
                        $success = false;
                        break;
                    }

                    $parentModel = App::make('App\Models\\' . $parentType);

                    $parent = $parentModel->where('rec_id', $parentId)->first();
                    if (!$parent) {
                        $logs[] = 'Error : Parent not found : '.$parentId;
                        $success = false;
                        break;
                    }

                    $arr['parent'] = get_class($parent) . '??' . $parent->id;
                    $request = new Request();
                    $request->replace($arr);
                    $validator = Validator::make($request->all(), $model->rules);
                    if ($validator->fails()) {
                        foreach ($validator->errors()->all() as $error) {
                            $logs[] = 'Error : ' . rec_id_replacer($error);
                            $success = false;
                        }
                        $logs[] = 'Rolling back the changes.';
                        $success = false;
                        break;
                    } else {
                        try {
                            $model->saveFormData($model, $request);
                        } catch (\Exception $exception) {
                            $logs[] = 'Error : Unknown error. Please contact the administer.';
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

        return view('import.index')->with(['status' => $success, 'logs' => $logs]);
    }


    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return ['header' => $header, 'data' => $data];
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
