<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EmployeeScope implements Scope
{
    /**
     * @param Builder $builder
     * @param Model $model
     */

    public $userType;

    public function __construct($userType = null)
    {
        $this->userType = $userType;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('usertype_id', $this->userType ?? 1);
    }
}
