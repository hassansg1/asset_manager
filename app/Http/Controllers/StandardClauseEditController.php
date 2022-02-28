<?php

namespace App\Http\Controllers;

use App\Models\Clause;
use App\Models\Compliance;
use App\Models\Standard;
use App\Repos\StandardClauseRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class StandardClauseEditController extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new Clause();
        $this->route = 'clause_edit';
        $this->heading = 'Clause';
        \Illuminate\Support\Facades\View::share('top_heading', 'Clauses List');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request, $standardId)
    {
        $request->request->add(['standard_id' => $standardId]);
        $request->request->add(['parent_id' => null]);
        $data = $this->fetchData($this->model, $request, new StandardClauseRepo());
        $standard = Standard::find($standardId);
        $this->heading = "$standard->name > Clauses";
        Session::put('standard_id', $standardId);
        Session::put('standard', $standard);
        return view($this->route . "/index")
            ->with(['items' => $data['items'], 'data' => $data, 'route' => $this->route, 'heading' => $this->heading, 'standard' => $standard, 'customHeading' => true]);
    }

    public  function  numberSequence($standardId){
        $compliances = Clause::where('standard_id', $standardId);
        foreach ($compliances as $compliance)
        {
            $clause = $compliance->number;
            $ex = explode('-',$clause);
            array_pop($ex);
            if(count($ex) > 0)
            {
                $imp = implode('-',$ex);
                $parent = Clause::where('number',$imp)->first();
                if($parent)
                {
                    $compliance->parent_id = $parent->id;
                    $compliance->save();
                }
            }
        }
        flashSuccess(getLang($this->heading . " Successfully Updated."));
        return redirect()->back();
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
        return redirect()->to(route('clause.create'));
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

        $cancelRoute = url('standards/edit/' . $item->standard_id . '/clause');
        if ($request->ajax) {
            return response()->json([
                'status' => true,
                'html' => view($this->route . '.edit_modal')->with(['route' => $this->route, 'item' => $item, 'clone' => $request->clone ?? null])->render()
            ]);
        } else
            return view($this->route . '.edit')->with(['route' => $this->route, 'cancelRoute' => $cancelRoute, 'item' => $item, 'heading' => $this->heading, 'clone' => $request->clone ?? null]);
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

        return redirect(url('standards/edit/' . $request->standard_id . '/clause'));
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

    public function viewStandards($standardId)
    {
        return $this->index($standardId, 1);
    }
}
