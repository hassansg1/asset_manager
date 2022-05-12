<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Repos\AssetReportRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AssetReportController extends BaseController
{
    protected $model;
    protected $repo;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new Asset();
        $this->repo = new AssetReportRepo();
        $this->route = 'asset_report';
        $this->heading = 'Assets Report';
        \Illuminate\Support\Facades\View::share('top_heading', 'Assets');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = $this->fetchData($this->model, $request, $this->repo);
        $columns = $this->repo->getColumns();
        $requestedColumns = json_decode($request->columns) ?? [];
        $selectedColumns = [];
        foreach ($columns as $key => $column) {
            if (in_array($key, $requestedColumns))
                $selectedColumns[] = $key;
        }

        $reflect = new \ReflectionClass($this->repo);

        return view($this->route . "/index")
            ->with(['items' => $data['items'], 'request' => $request, 'repo' => $reflect->getShortName(), 'selectedColumns' => $selectedColumns, 'columns' => $columns, 'data' => $data, 'filter' => $filter[0] ?? null, 'model' => $this->model, 'route' => $this->route, 'heading' => $this->heading]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request)
    {
        $data = $this->fetchData($this->model, $request);

        return response()->json([
            'status' => true,
            'html' => view($this->route . "/form_rows")
                ->with(['items' => $data['items'], 'data' => $data, 'route' => $this->route, 'heading' => $this->heading])->render(),
            'data' => $data
        ]);
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
