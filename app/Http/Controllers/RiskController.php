<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new Risk();
        $this->route = 'risk';
        $this->heading = 'Risk';
        \Illuminate\Support\Facades\View::share('top_heading', 'Risk');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Risk::paginate();

        return view($this->route . "/index")
            ->with(['items' => $data, 'route' => $this->route, 'heading' => $this->heading]);
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
        $heading = $this->heading.' ('.$item->risk_number.')';
        return view($this->route . '.view')->with(['route' => $this->route, 'item' => $item, 'heading' => $heading, 'clone' => $request->clone ?? null]);
    }

    public function edit(Request $request, $item)
    {
        if ($item == 0) {
            if (is_array($request->item))
                $item = $this->model->find('id', $request->item);
        }
        $item = $this->model->find($item);
        $heading = $this->heading.' ('.$item->risk_number.')';
        if ($request->ajax) {
            return response()->json([
                'status' => true,
                'html' => view($this->route . '.edit_modal')->with(['route' => $this->route, 'item' => $item ,'clone' => $request->clone ?? null])->render()
            ]);
        } else
            return view($this->route . '.edit')->with(['route' => $this->route, 'item' => $item, 'heading' => $heading,'clone' => $request->clone ?? null]);
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
