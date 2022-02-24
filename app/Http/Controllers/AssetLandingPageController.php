<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\LoneAsset;
use App\Models\NetworkAsset;
use Illuminate\Http\Request;

class AssetLandingPageController extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->route = 'asset_lending_page';
        $this->heading = 'Asset Landing Page';
        \Illuminate\Support\Facades\View::share('top_heading', 'Asset Landing Page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lonAssets = $this->fetchData(new LoneAsset(), $request);
        $computerAssets = $this->fetchData(new Computer(), $request);
        $netwrokAssets = $this->fetchData(new NetworkAsset(), $request);
        return view('asset_landing_page/index')
            ->with(['lone_assets' => $lonAssets['items'], 'computer_assets' => $computerAssets['items'], 'network_assets' => $netwrokAssets['items'], 'route' => $this->route, 'heading' => $this->heading]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
