<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\HardwareLegacy;
use App\Models\LoneAsset;
use App\Models\SoftwareLegacy;
use Illuminate\Http\Request;

class LegacySystem extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->route = 'legacy_system';
        $this->heading = 'Legacy System';
        \Illuminate\Support\Facades\View::share('top_heading', 'Legacy System');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hardwareLegacy = $this->fetchData(new HardwareLegacy(), $request);
        $softwareLegacy = $this->fetchData(new SoftwareLegacy(), $request);
        return view('legacy_system/index')
            ->with(['route' => $this->route, 'heading' => $this->heading, 'hardware_legacy' => $hardwareLegacy['items'], 'software_legacy' => $softwareLegacy['items'],]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
