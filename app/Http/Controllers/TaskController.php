<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Notification;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->get();

        return view('task.index')->with(['items' => $tasks, 'heading' => 'Task', 'route' => 'task']);
    }
    public function viewLogDetais($id){
        $log = Log::where('id', $id)->first();
        return view('task.log_detail')->with(['item' => $log, 'heading' => 'Task detail', 'route' => 'task']);
    }
    public function changeTaskStatus($id){
        dd($id);
    }
}
