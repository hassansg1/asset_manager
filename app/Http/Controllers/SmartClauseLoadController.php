<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartClauseLoadController extends Controller
{
    //
    public function index(Request $request)
    {
        $standardId = $request->standardId;
        $clauseId = $request->clauseId;
        $route = $request->route;
        $tree = getClauseTree($standardId, $clauseId);

        return response()->json([
            'status' => true,
            'html' => view($route . '.form_rows')->with(['items' => $tree, 'route' => $route])->render()
        ]);
    }
}
