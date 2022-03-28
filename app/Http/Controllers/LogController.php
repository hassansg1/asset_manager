<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Notification;
use App\Models\Task;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogController extends BaseController
{
    public function __construct()
    {
        $this->model = new Log();
        $this->route = 'log';
        $this->heading = 'Log';
        \Illuminate\Support\Facades\View::share('top_heading', 'Logs');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $data = $this->fetchData($this->model, $request);

        return view($this->route . "/index")
            ->with(['items' => $data['items'], 'data' => $data, 'route' => $this->route, 'heading' => $this->heading]);
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

        $taskId = $log->task->id;

        $arr = array_diff_key((array)$log->new(), ['id' => 'aa']);
        if ($log->action == 'CREATED') {
            DB::table($log->table_name)->insert((array)$log->new());
        } elseif ($log->action == 'UPDATED') {
            DB::table($log->table_name)->where('id', $log->new()->id)->update($arr);
        } elseif ($log->action == 'DELETED') {
            DB::table($log->table_name)->where('id', $log->old()->id)->delete();
        }
        $log->approved = 1;
        $log->save();

        Notification::addNotification(Notification::APPROVAL_REQUEST_APPROVED, $log->user_id);
        Log::addLog(currentUserId(), $log->model, $log->model_id, 'Approved', $log->table_name, 'Change Request Approved', $log->message, $log->models, 0, 0);
        if($taskId){
            Task::where('id',$taskId)->update(['status'=>Task::getTaskType('approval_request_close')]);
        }

        return redirect()->back();
    }

    public function reject($id)
    {
        $log = Log::find($id);

        $log->approved = 2;
        $log->save();

        Notification::addNotification(Notification::APPROVAL_REQUEST_REJECTED, $log->user_id);
        Log::addLog(currentUserId(), $log->model, $log->model_id, 'Rejected', $log->table_name, 'Change Request Rejected', $log->message, $log->models, 0, 0);

        $taskId = $log->task->id;
        if($taskId){
            Task::where('id',$taskId)->update(['status'=>Task::getTaskType('approval_request_close')]);
        }
        return redirect()->back();
    }

    public function remove($id)
    {
        $log = Log::find($id);
        $taskId = $log->task->id;
        $log->delete();

        Notification::addNotification(Notification::APPROVAL_REQUEST_REJECTED, $log->user_id);
        Log::addLog(currentUserId(), $log->model, $log->model_id, 'DELETED', $log->table_name, 'Change Request Deleted', $log->message, $log->models, 0, 0);
        if($taskId){
            Task::where('id',$taskId)->update(['status'=>Task::getTaskType('approval_request_close')]);
        }
        return redirect()->back();

    }
}
