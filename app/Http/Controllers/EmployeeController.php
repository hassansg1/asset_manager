<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SystemAssets;
use App\Models\UserAccount;
use App\Models\UserId;
use App\Repos\SystemUserRepo;
use App\Repos\UserRepo;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new Employee();
        $this->route = 'employee';
        $this->heading = 'User';
        \Illuminate\Support\Facades\View::share('top_heading', 'User');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = $this->fetchData($this->model, $request, new SystemUserRepo());
        return view($this->route . "/index")
        ->with(['items' => $data['items'], 'route' => $this->route, 'heading' => $this->heading]);
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
        $heading = $this->heading.' ('.$item->username.')';
        $SelectedAccount = UserAccount::select('account_id')->where('user_id', $item->id)->get();
        $userIds = UserId::whereIn('id', $SelectedAccount)->get();
        return view($this->route . '.view')->with(['route' => $this->route, 'item' => $item, 'userIds' => $userIds,'heading' => $heading, 'clone' => $request->clone ?? null]);
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
        $SelectedAccount = UserAccount::select('account_id')->where('user_id', $item)->get();
        $userIds = UserId::whereIn('id', $SelectedAccount)->get();
        $child_arr = [];
        foreach($SelectedAccount as $subchild) {
            $child_arr[] = $subchild->account_id;
        }
        $item = $this->model->find($item);
        $heading = $this->heading.' ('.$item->username.')';
        if ($request->ajax) {
            return response()->json([
                'status' => true,
                'html' => view($this->route . '.edit_modal')->with(['route' => $this->route, 'item' => $item,'child_arr' => $child_arr, 'userIds' => $userIds,'clone' => $request->clone ?? null])->render()
            ]);
        } else
        return view($this->route . '.edit')->with(['route' => $this->route, 'item' => $item, 'child_arr' => $child_arr, 'userIds' => $userIds,'heading' => $heading, 'clone' => $request->clone ?? null]);
    }

    /**
     * @param Request $request
     * @param $item
     */
    public function update(Request $request, $item)
    {
        $request->validate($this->model->rules);
        $item = $this->model->find($item);
        $this->model->saveFormData($item, $request);

        flashSuccess(getLang($this->heading . " Successfully Updated."));

        return redirect(route($this->route . ".index",$item));
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
