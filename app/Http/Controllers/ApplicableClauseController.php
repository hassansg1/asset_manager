<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\ClauseData;
use App\Models\Company;
use App\Models\ComplianceVersion;
use App\Models\ComplianceVersionItem;
use App\Models\ComplianceVersionItemAttachment;
use App\Models\StandardClause;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class ApplicableClauseController extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new StandardClause();
        $this->route = 'applicable_clause';
        $this->heading = 'Applicable Clause';
        \Illuminate\Support\Facades\View::share('top_heading', 'Applicable Clauses');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
//        $data = $this->fetchData($this->model, $request);
        $items = Compliance::orderBy('id', 'desc')->get();

        return view($this->route . "/index")
            ->with(['items' => $items, 'route' => $this->route, 'heading' => $this->heading]);
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

        return view($this->route . '.view')->with(['route' => $this->route, 'item' => $item, 'heading' => $this->heading, 'clone' => $request->clone ?? null]);
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
        $item = $this->model->find($item);


        if ($request->ajax) {
            return response()->json([
                'status' => true,
                'html' => view($this->route . '.edit_modal')->with(['route' => $this->route, 'item' => $item, 'clone' => $request->clone ?? null])->render()
            ]);
        } else
            return view($this->route . '.edit')->with(['route' => $this->route, 'item' => $item, 'heading' => $this->heading, 'clone' => $request->clone ?? null]);
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

    public function storeClauseData(Request $request)
    {
//        $data = ClauseData::saveFormData($request);
        $clause = StandardClause::find($request->clause_id);
        if ($request->column_name ==  'applicable' && $request->value == 0){
            $clause->location = null;
        }
        $clause->{$request->column_name} = $request->value;
        $clause->save();

        return response()->json([
            'status' => true,
        ]);
    }

    public function complianceFileStore(Request $request, $id)
    {

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $destinationPath = public_path('images/compliance');
        $file->move($destinationPath, $name);
        $data = ClauseDataFiles::create(['compliance_data_id' => $id, 'file_name' => $name]);
        return true;
    }

    public function complianceApplicable()
    {

        $items = ClauseData::where('applicable', '=', 1)->orderBy('id', 'desc')->get();
        return view($this->route . "/applicable")
            ->with(['items' => $items, 'route' => $this->route, 'heading' => $this->heading]);
    }

    public function complianceApplicableViewDetail($id)
    {
        $items = ClauseData::find($id);
        return view($this->route . "/view_detail")
            ->with(['items' => $items, 'route' => $this->route, 'heading' => $this->heading]);
    }

    public function storeClauseDataLocations(Request $request)
    {
        if ($request->value == 1) {
            return response()->json([
                'html' => \view('ajax.compliance_drop_down')->with('locations', Company::all())->render()
            ]);
        }
        ClauseData::saveLocations($request);
    }

    public function getLocationsOfCompliance(Request $request)
    {
        $complianceD = StandardClause::find($request->trId);
        if ($complianceD->location ==null){
            return response()->json([
                'status' => false
            ]);
        }
        $locationModel = 'App\Models\\' . $complianceD->location;
        $locations = $locationModel::get();
        $attachments = Attachment::get();
        $version = ComplianceVersion::find($request->version);
        return response()->json([
            'html' => \view('version_compliance.location_table')->with(['locations' => $locations, 'version' => $version, 'versionId' => $request->version, 'item_id' => $request->trId, 'attachments' => $attachments])->render(),
            'status' => true
        ]);
    }

    public function updateComplianceVersionItems(Request $request)
    {
        $complianceVersionItems = ComplianceVersionItem::where('location_id', $request->location_id)
            ->where('compliance_version_id', $request->compliance_version_id)
            ->where('compliance_data_id', $request->compliance_data_id)
            ->first();
        if ($complianceVersionItems == null) {
            $complianceVersionItems = new ComplianceVersionItem;
            $complianceVersionItems->compliance_version_id = $request->compliance_version_id;
            $complianceVersionItems->compliance_data_id = $request->compliance_data_id;
            $complianceVersionItems->location_id = $request->location_id;
        }
        if ($request->compliant) {
            $complianceVersionItems->compliant = $request->compliant;
        }
        if ($request->comment) {
            $complianceVersionItems->comment = $request->comment;
        }
        if ($request->link) {
            $complianceVersionItems->link = $request->link;
        }
        $complianceVersionItems->save();

        $complianceVersionItems->attachments()->delete();

        if ($request->attachment_id) {
            $attachemnts = $request->attachment_id;
            foreach ($attachemnts as $attachemnt) {
                ComplianceVersionItemAttachment::create([
                    'compliance_version_item_id' => $complianceVersionItems->id,
                    'attachment_id' => $attachemnt,
                ]);
            }
        }


        return response()->json([
            'status' => true
        ]);

    }
}
