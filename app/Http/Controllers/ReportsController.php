<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use App\Models\SystemAssets;
use App\Models\User;
use App\Models\UserId;
use App\Models\UserAccount;
use App\Models\AssetUserId;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new Reports();
        $this->route = 'user_asset_report';
        $this->heading = 'Reports';
        \Illuminate\Support\Facades\View::share('top_heading', 'Reports');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('user_type', 'OTCM-USERS')->get();
        $user_ids = UserId::paginate();
        return view($this->route . "/index")
            ->with(['route' => $this->route,'items'=>$user_ids,'users'=>$users,'heading' => $this->heading]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::where('user_type', 'OTCM-USERS')->paginate();
        return view($this->route . "/create")
            ->with(['route' => $this->route, 'items' => $users,'heading' => $this->heading]);
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

        return view($this->route . '.view')->with(['route' => $this->route, 'item' => $item, 'heading' => $this->heading, 'clone' => $request->clone ?? null]);
    }

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
