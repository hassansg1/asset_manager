<?php

namespace App\Repos;

use App\Models\Software;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserRepo
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

        $this->applyFilterOtcmUser($request);

        return $this->query;
    }

    public function applyFilterOtcmUser($request)
    {
        $this->query = $this->query->where('user_type', 'OTCM-USER');
    }
}
