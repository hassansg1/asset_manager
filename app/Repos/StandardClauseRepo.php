<?php

namespace App\Repos;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StandardClauseRepo
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

        $this->applyStandardIdFilter($request);
        $this->applyParentFilter($request);

        return $this->query;
    }

    /**
     * @param $request
     * @return void
     */
    public function applyStandardIdFilter($request)
    {
        if (isset($request->standard_id)) {
            $this->query = $this->query->where('standard_id', $request->standard_id);
        }
    }

    /**
     * @param $request
     * @return void
     */
    public function applyParentFilter($request)
    {
        if (isset($request->parent_id)) {
            $this->query = $this->query->where('parent_id', $request->parent_id);
        }
    }
}
