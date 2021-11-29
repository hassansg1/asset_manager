<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocTreeController extends Controller
{
    //
    public function sidebar_tree()
    {
        return response()->json([
            'status' => true,
            'html' => view('components.sidebar_tree')->render()
        ]);
    }
}
