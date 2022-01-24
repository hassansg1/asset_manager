<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class LocationScope implements Scope
{
    /**
     * @param Builder $builder
     * @param Model $model
     */

    public $locationType;

    public function __construct($locationType = null)
    {
        $this->locationType = $locationType;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('type', $this->locationType);
    }
}
