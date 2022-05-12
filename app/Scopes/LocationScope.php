<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

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
        if (is_array($this->locationType))
            $builder->whereIn('type', $this->locationType);
        else
            $builder->where('type', $this->locationType);
    }
}
