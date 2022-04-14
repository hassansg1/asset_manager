<?php

namespace App\Http\Controllers;

use App\Models\HelpSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HelpController extends Controller
{
    //

    public function saveHelp(Request $request)
    {
        HelpSection::updateOrCreate([
            'route_name' => $request->route,
        ], [
            'help_content' => $request->text,
            'route_name' => $request->route,
        ]);
        return response()->json([
            'status' => true
        ]);
    }
}
