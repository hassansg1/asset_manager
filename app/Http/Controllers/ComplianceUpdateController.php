<?php

namespace App\Http\Controllers;

use App\Models\Compliance;
use App\Models\ComplianceVersion;
use App\Models\ComplianceVersionItem;
use App\Models\ComplianceVersionItemAttachment;
use App\Models\Location;
use App\Models\Standard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class ComplianceUpdateController extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new ComplianceVersion();
        $this->route = 'version';
        $this->heading = 'Compliance Version';
        \Illuminate\Support\Facades\View::share('top_heading', 'Compliance Version');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = $this->fetchData($this->model, $request);

        return view($this->route . "/index")
            ->with(['data' => $data, 'items' => $data['items'], 'route' => $this->route, 'heading' => $this->heading]);
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

    public function changeApplicableStatus(Request $request)
    {
        $status = $request->value == 'false' ? 0 : 1;
        Standard::where('id', $request->id)->update(['applicable' => $status]);

        return response()->json([
            'status' => true
        ]);
    }

    public function submitCompliance(Request $request)
    {
        if (isset($request->id) && $request->id != "")
            $item = ComplianceVersionItem::find($request->id);
        else {
            $item = new ComplianceVersionItem;
            $item->compliance_version_id = $request->compliance_version_id;
            $item->clause_id = $request->clause_id;
            $item->location_id = $request->location_id;
        }

        $item->compliant = $request->compliant;
        $item->comment = $request->comment;
        $item->link = $request->link;
        $item->save();
        $item->attachments()->delete();

        if ($request->attachments) {
            $attachemnts = $request->attachments;
            foreach ($attachemnts as $attachemnt) {
                ComplianceVersionItemAttachment::create([
                    'compliance_version_item_id' => $item->id,
                    'attachment_id' => $attachemnt,
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'html' => view('version_compliance.location_table_row')->with(
                [
                    'dt' => $item,
                    'location' => Location::find($request->location_id),
                    'item_id' => $item->clause_id,
                    'location_id' => $request->location_id,
                    'versionId' => $request->compliance_version_id
                ])->render()
        ]);
    }
}
