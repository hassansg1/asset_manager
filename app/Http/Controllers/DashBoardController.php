<?php

namespace App\Http\Controllers;

use App\Models\ClauseData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index(){
       $items =  ClauseData::with('compliance')->where('user_id',Auth::id())->orderBy('id','desc')->get();

        return view('dashboard.index')->with(['items' => $items, 'heading' => 'Dashboard', 'route' => 'dashboard']);

    }
}
