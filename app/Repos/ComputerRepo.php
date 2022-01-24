<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ComputerRepo
{
    //
    public $query;

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function filter($query, $request)
    {
        $this->query = $query;

        $this->applyAssetFilter($request);

        return $this->query;
    }

    public function applyAssetFilter($request)
    {
        if (isset($request->asset_id_filter)) {
            $this->query = $this->query->where('id', '=', $request->asset_id_filter);
        }

    }
}
