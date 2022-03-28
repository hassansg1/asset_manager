<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\SystemAssets;
use Illuminate\Http\Request;

class SystemController extends Controller
{
 protected $model;
 protected $route;
 protected $heading;
 protected $topHeading;

 public function __construct()
 {
    $this->model = new System();
    $this->route = 'system';
    $this->heading = 'System';
    \Illuminate\Support\Facades\View::share('top_heading', 'System');
}

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = System::paginate();

        return view($this->route . "/index")
        ->with(['items' => $data, 'route' => $this->route, 'heading' => $this->heading]);
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
        $request->validate($this->model->rules($request->function));
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
        $SelectedAssets = SystemAssets::select('asset_id')->where('system_id', $item)->get();
        $child_arr = [];
        foreach($SelectedAssets as $subchild) {
            $child_arr[] = $subchild->asset_id;
        }
        $item = $this->model->find($item);
        $heading = $this->heading.' ('.$item->name.')';
        return view($this->route . '.view')->with(['route' => $this->route, 'item' => $item, 'heading' => $heading, 'selectedAssets'=>$child_arr,'clone' => $request->clone ?? null]);
    }

    /**
     * @param Request $request
     * @param $item
     * @return Application|Factory|View|\Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, $item)
    {
        if ($item == 0) {
            if (is_array($request->item))
                $item = $this->model->find('id', $request->item);
        }
        $SelectedAssets = SystemAssets::select('asset_id')->where('system_id', $item)->get();
        $child_arr = [];
        foreach($SelectedAssets as $subchild) {
            $child_arr[] = $subchild->asset_id;
        }
        $item = $this->model->find($item);
        $heading = $this->heading.' ('.$item->name.')';
        if ($request->ajax) {
            return response()->json([
                'status' => true,
                'html' => view($this->route . '.edit_modal')->with(['route' => $this->route, 'selectedAssets'=>$child_arr,'item' => $item, 'clone' => $request->clone ?? null])->render()
            ]);
        } else
        return view($this->route . '.edit')->with(['route' => $this->route, 'item' => $item, 'selectedAssets'=>$child_arr,'heading' => $heading, 'clone' => $request->clone ?? null]);
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
        $item = $this->model->find($item);
        $item->delete();

        flashSuccess(getLang($this->heading . " Successfully Deleted."));

        return redirect(route($this->route . ".index"));
    }
}
