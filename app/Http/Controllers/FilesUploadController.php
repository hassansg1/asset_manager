<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Faker\Core\File;
use Illuminate\Http\Request;

class FilesUploadController extends Controller
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new File();
        $this->route = 'files';
        $this->heading = 'Files';
        \Illuminate\Support\Facades\View::share('top_heading', 'Files');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->route . "/create")
            ->with(['route' => $this->route, 'heading' => $this->heading]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('ds');
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filesStore(Request $request){

        $image = $request->file('file');
        if($image) {
            $imageName = $image->getClientOriginalName();
            $name = time() . $imageName;
            $image->move(public_path('images/files'), $name);

            $imageUpload = new Files();
            $imageUpload->filesable_type = "App\Models\Files";
            $imageUpload->filesable_id = 1;
            $imageUpload->fileName = $name;
            $imageUpload->version = $name;
            $imageUpload->save();
            return true;
        }
    }
}
