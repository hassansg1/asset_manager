<?php

namespace App\Http\Controllers;

use App\Models\AssetFunction;
use App\Models\Location;
use Illuminate\Http\Request;

class AssetFunctionController extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new AssetFunction();
        $this->route = 'asset_function';
        $this->heading = 'Asset Functions';
        \Illuminate\Support\Facades\View::share('top_heading', 'Asset Functions');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = $this->fetchData($this->model, $request);
        return view($this->route . "/index")
            ->with(['items' => $data['items'], 'route' => $this->route, 'data' => $data,'heading' => $this->heading]);
    }
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view($this->route . "/create")
            ->with(['route' => $this->route, 'heading' => $this->heading]);
    }

    /**
     * @param Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate($this->model->rules);
        $this->model->saveFormData($this->model, $request);

        flashSuccess(getLang($this->heading . " Successfully Created."));

        if (isset($request->add_new)) return redirect(route($this->route . ".create"));

        return redirect(route($this->route . ".index"));
    }

    /**
     * @param $item
     */
    public function show($item)
    {
        $item = $this->model->find($item);
        return view($this->route . '.view')->with(['route' => $this->route, 'item' => $item, 'heading' => $this->heading,'clone' => $request->clone ?? null]);
    }

    /**
     * @param Request $request
     * @param $item
     * @return Application|Factory|View|\Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, $item)
    {
        $item = $this->model->find($item);

        return view($this->route . '.edit')->with(['route' => $this->route, 'item' => $item,'heading' => $this->heading, 'clone' => $request->clone ?? null]);
    }

    /**
     * @param Request $request
     * @param $item
     */
    public function update(Request $request, $item)
    {
        $item = $this->model->find($item);
        $this->model->saveFormData($item, $request);

        flashSuccess(getLang($this->heading . " Successfully Updated."));

        return redirect(route($this->route . ".index"));
    }

    /**
     * @param $item
     */
    public function destroy($item)
    {
        $assignedAssets = Location::where('function', $item)->get();
        if ($assignedAssets){
            flashSuccess(getLang("Asset Function is assigned to Assets cannot be deleted."));
            return redirect(route($this->route . ".index"));
        }
        $item = $this->model->find($item);
        $item->delete();

        flashSuccess(getLang($this->heading . " Successfully Deleted."));

        return redirect(route($this->route . ".index"));
    }
}
