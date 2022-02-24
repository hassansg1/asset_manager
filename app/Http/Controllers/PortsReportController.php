<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PortsReportController extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new Port();
        $this->route = 'reports/ports';
        $this->heading = 'Ports Report';
        \Illuminate\Support\Facades\View::share('top_heading', 'Ports Report');
    }


    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $request->request->add(['items_per_page' => 'all', 'groupBy'=>'location_id']);
        $data = $this->fetchData($this->model, $request);
        $data['no_header'] = true;
        return view($this->route . "/index")
            ->with(['items' => $data['items'], 'data' => $data, 'route' => $this->route, 'heading' => $this->heading]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request)
    {
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
