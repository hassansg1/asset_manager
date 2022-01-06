<?php

namespace App\Http\Controllers;

use App\Models\Compliance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ComplianceImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('compliance_import.index');
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
        $file->move(public_path('files'), $name);

        $file = public_path('files/' . $name);

        $csvContent = csvToArray($file, ',', true);
        $data = $csvContent['data'];
        $count = 0;
        foreach ($data as $obj) {
            $count++;
            $logs[] = 'Precessing row no. ' . $count;
            for ($i = 0; $i < count($obj); $i++) {
                try {
                    $compliance = new Compliance();
                    $compliance->clause = utf8_encode($obj[0]) ?? '';
                    $compliance->section = utf8_encode($obj[1]) ?? '';
                    $compliance->objective = utf8_encode($obj[2]) ?? '';
                    $compliance->control = utf8_encode($obj[3]) ?? '';
                    $compliance->policies = utf8_encode($obj[4]) ?? '';
                    $compliance->policies_extended = utf8_encode($obj[5]) ?? '';
                    $compliance->nwc_applicable = utf8_encode($obj[6]) ?? '';
                    $compliance->action_item = utf8_encode($obj[7]) ?? '';
                    $compliance->compliant = utf8_encode($obj[8]) ?? '';
                    $compliance->proof = utf8_encode($obj[9]) ?? '';
                    $compliance->save();
                }
                catch (\Exception $exception)
                {
//                    dd(utf8_encode($obj[2]));
                    dump($exception->getMessage());
                }
            }
            $logs[] = '<br>';
        }
        dd("done");
        return view('import.index')->with(['status' => true, 'logs' => $logs]);
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
