<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    //

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function filter(Request $request)
    {
        $data = $this->fetchData($request->model);

        return view($request->route . "/index")
            ->with(['items' => $data['items'], 'data' => $data, 'route' => $this->route, 'heading' => $this->heading]);
    }
}
