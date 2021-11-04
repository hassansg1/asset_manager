<?php

namespace App\Http\Controllers;

use App\Models\ComplianceData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index(){
       $items =  ComplianceData::with('compliance')->where('user_id',Auth::id())->orderBy('id','desc')->get();

        return view('dashboard.index')->with(['items' => $items, 'heading' => 'Dashboard', 'route' => 'dashboard']);

    }
}
