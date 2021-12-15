<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
Use Image;
use Illuminate\Contracts\View\View;

class SettingsController extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new Settings();
        $this->route = 'settings';
        $this->heading = 'settings';
        \Illuminate\Support\Facades\View::share('top_heading', 'Settings');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = Settings::first();
        return view($this->route . "/index")
        ->with(['data'=>$data, 'route' => $this->route, 'heading' => $this->heading]);
    }


    /**
     * @return Application|Factory|View
     */
    public function create()
    {

    }

    /**
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate($this->model->rules);
        // $this->model->saveFormData($this->model, $request);
        if ($logo = $request->file('logo')) {
            $this->storeImage($logo);
            $logo =$logo->getClientOriginalName();
        }
        if ($logo_icon = $request->file('logo_icon')) {
            $this->storeImage($logo_icon);
            $logo_icon =$logo_icon->getClientOriginalName();
        }
        $new = Settings::updateOrCreate([
            'title' => $request->title,
        ],[
            'title' => $request->title,
            'item_per_page' =>$request->item_per_page,
            'logo' =>$logo,
            'logo_icon' =>$logo_icon,
        ]);

        flashSuccess(getLang($this->heading . " Successfully Created."));

        return redirect(route($this->route . ".index"));
    }

    public function storeImage($files){
        $name = $files->getClientOriginalName();
        $destinationPath = public_path('images\logo');
        $files->move($destinationPath, $name);
    }

    /**
     * @param $item
     */
    public function show($item)
    {

    }

    /**
     * @param Request $request
     * @param $item
     * @return Application|Factory|View|\Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, $item)
    {

    }

    /**
     * @param Request $request
     * @param $item
     */
    public function update(Request $request, $item)
    {

    }

    /**
     * @param $item
     */
    public function destroy($item)
    {

    }
}
