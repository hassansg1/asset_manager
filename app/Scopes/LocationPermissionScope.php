<?php

namespace App\Scopes;

use App\Models\UserLocation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LocationPermissionScope implements Scope
{
    /**
     * @param Builder $builder
     * @param Model $model
     */

    public $locationType;

    public function __construct()
    {
    }

    public function apply(Builder $builder, Model $model)
    {
        $locations = UserLocation::getLocations('location');
        $builder->where(function ($query) use ($locations, $builder) {
            foreach ($locations as $location) {
                $query->whereDescendantAndSelf($location);
            }
        });
//        $builder->where(function ($query) use ($locations) {
//            $query->whereIn('id', $locations);
//            $query->orWhereIn('parent_id', $locations);
//        });
    }
}
