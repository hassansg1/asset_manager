<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ComplianceVersion;
use App\Models\ComplianceVersionItem;
use App\Models\Location;
use App\Models\Risk;
use Illuminate\Http\Request;

class ComplianceVersionReport extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new ComplianceVersion();
        $this->route = 'reports/clauses_report';
        $this->heading = 'Clauses Report';
        \Illuminate\Support\Facades\View::share('top_heading', 'Clauses Report');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->request->add(['items_per_page' => 'all']);
        $data = $this->fetchData($this->model, $request);
        $data['no_header'] = true;
        return view($this->route . "/index")
            ->with(['items' => $data['items'], 'data' => $data, 'route' => $this->route, 'heading' => $this->heading]);

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
    public function show($versionId, $complaint)
    {
        $heading = ComplianceVersion::select('name')->where('id', $versionId)->first();
        $this->heading = $heading->name;
        $data['items'] = ComplianceVersionItem::where('compliance_version_id', $versionId)->where('compliant', $complaint)->groupBy('location_id')->paginate();
        $data['no_header'] = true;
        return view($this->route . "/complaint_report")->with(['items' => $data['items'],'data' => $data, 'route' => $this->route, 'heading' => $this->heading]);
    }
    public function location_wise_clauses($location_id, $complaint){
        $heading = Location::where('id', $location_id)->first();
        $this->heading = $heading->long_name;
        $data['items'] = ComplianceVersionItem::where('location_id', $location_id)->where('compliant', $complaint)->paginate();
        $data['no_header'] = true;
        return view($this->route . "/location_clause_report")->with(['items' => $data['items'],'data' => $data, 'route' => $this->route, 'heading' => $this->heading]);
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
