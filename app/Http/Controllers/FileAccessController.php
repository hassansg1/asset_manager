<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileAccessController extends Controller
{
    //

    public function __construct()
    {
        // This will block anyone who is not registered from continuing with this request
        $this->middleware('auth');
    }

    public function getFile($filename)
    {
        // The Response class has the helper function response() that you can use
        return response()->download(storage_path('app\public\library_documents\\'.$filename), null, [], null);
    }
}
