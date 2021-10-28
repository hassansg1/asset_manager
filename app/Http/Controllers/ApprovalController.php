<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::where('approval_request', 1)->orderBy('id', 'desc')->get();

        return view('approval.index')->with(['items' => $logs, 'heading' => 'Log', 'route' => 'log']);
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
        //
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

    public function approve($id)
    {
        $log = Log::find($id);

        $arr = array_diff_key((array)$log->new(), ['id' => 'aa']);
        if ($log->action == 'CREATED') {
            DB::table($log->table_name)->insert((array)$log->new());
        } elseif ($log->action == 'UPDATED') {
            DB::table($log->table_name)->where('id', $log->new()->id)->update($arr);
        }elseif ($log->action == 'DELETED') {
            DB::table($log->table_name)->where('id', $log->old()->id)->delete();
        }
        $log->approved = 1;
        $log->save();

        return redirect()->back();
    }

    public function reject($id)
    {
        $log = Log::find($id);

        $log->approved = 2;
        $log->save();

        return redirect()->back();
    }
}
