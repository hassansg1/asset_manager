<?php

namespace App\Http\Controllers;

use App\Models\SystemAssets;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\UserId;
use App\Models\Right;
use App\Models\UserRight;
use Illuminate\Http\Request;

class UserIdController extends Controller
{
    protected $model;
    protected $route;
    protected $heading;
    protected $topHeading;

    public function __construct()
    {
        $this->model = new UserId();
        $this->route = 'user_id';
        $this->heading = 'User ID';
        \Illuminate\Support\Facades\View::share('top_heading', 'User ID');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $data = UserId::paginate();

        return view($this->route . "/index")
            ->with(['items' => $data, 'route' => $this->route, 'heading' => $this->heading]);
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
            if($request->user_type == "asset"){
                $request->validate($this->model->rules($request->asset_id));
            }if($request->user_type == "system"){
                $request->validate($this->model->rules($request->system_id));
            }
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
        $SelectedRights = UserRight::select('right_id')->where('parent_id', $item)->get();
        $child_arr = [];
        foreach($SelectedRights as $subchild) {
            $child_arr[] = $subchild->right_id;
        }
        $assign_users = UserAccount::select('user_id')->where('account_id', $item)->get();
        $users = User::whereIn('id', $assign_users)->get();
        $item = $this->model->find($item);
        $heading = $this->heading.' ('.$item->user_id.')';
        return view($this->route . '.view')->with(['route' => $this->route, 'item' => $item, 'users' => $users,'selectedRights'=>$child_arr ,'heading' => $heading, 'clone' => $request->clone ?? null]);
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
        $SelectedRights = UserRight::select('right_id')->where('parent_id', $item)->get();
        $child_arr = [];
        foreach($SelectedRights as $subchild) {
            $child_arr[] = $subchild->right_id;
        }
        $assign_users = UserAccount::select('user_id')->where('account_id', $item)->get();
        $users = User::whereIn('id', $assign_users)->get();
        $item = $this->model->find($item);
        $heading = $this->heading.' ('.$item->user_id.')';
        if ($request->ajax) {
            return response()->json([
                'status' => true,
                'html' => view($this->route . '.edit_modal')->with(['route' => $this->route, 'item' => $item,'users' => $users, 'selectedRights'=>$child_arr ,'clone' => $request->clone ?? null])->render()
            ]);
        } else
            return view($this->route . '.edit')->with(['route' => $this->route, 'item' => $item, 'users' => $users, 'selectedRights'=>$child_arr , 'heading' => $heading, 'clone' => $request->clone ?? null]);
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
