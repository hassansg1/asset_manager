<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeeAssetController extends Controller
{
    //

    public function view($locationId)
    {
        Session::put('asset_location_id', $locationId);
        return redirect()->to(url('assets/computer'));
    }
}
