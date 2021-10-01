<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //

    public function getNewAjaxRow(Request $request)
    {
        return response()->json(
            [
                'html' => view('assets_shared.port_row')->with('network', $request->network)->render()
            ]
        );
    }
}
