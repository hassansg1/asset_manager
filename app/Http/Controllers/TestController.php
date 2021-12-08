<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TestController extends Controller
{
    //
    public function test()
    {
        Artisan::call('migrate:data');
////        Artisan::call('sync:parents');
//        Location::fixTree();
    }
}
