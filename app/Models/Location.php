<?php

namespace App\Models;

use App\Http\Traits\LocationTrait;
use App\Http\Traits\Observable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Kalnoy\Nestedset\NodeTrait;

class Location extends Model
{
    use HasFactory;
    use Observable;
    use NodeTrait;
    use LocationTrait;

    public static function getHierarchyLevelForCreation($type)
    {
        $arr = self::getTypeArray();
        $i = array_search($type, array_keys($arr));

        return array_keys(array_slice($arr, 0, $i));
    }

    public static function getTypeToModel($type)
    {
        $arr = self::getTypeArray();

        return $arr[$type] ?? '';
    }

    public static function getTypeArray()
    {
        return [
            'companies' => 'Company',
            'units' => 'Unit',
            'sites' => 'Site',
            'sub_sites' => 'SubSite',
            'buildings' => 'Building',
            'rooms' => 'Room',
            'cabinets' => 'Cabinet',
            'assets' => 'Assets',
        ];
    }

    protected $guarded = [];

    protected $appends = ['text'];

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    public function getTextAttribute()
    {
        return $this->short_name != "" ? $this->short_name : ($this->name != "" ? $this->name : $this->rec_id);
    }

    public function softwares()
    {
        return $this->hasMany(InstalledSoftware::class, 'asset_id');
    }

    public static function applyLocationFilter($userLocations = null, $model = null, $query = null, $type = null, $action = null, $withOutAssets = false,$noAssetLocationFilter = false)
    {
        if (!$query)
            $query = new Location();
        if (!$model)
            $model = new Location();
        if (!$userLocations)
            $userLocations = UserLocation::getLocations();

        if (!checkIfSuperAdmin()) {
            $query = $query->where(function ($query) use ($userLocations, $model, $type, $action) {
                if (!isset($type))
                    $type = getTypeForPermission($model);
                if (!isset($action)) {
                    $hierarchyLocations = $userLocations->where('type', $type)->pluck('location_id')->toArray();
                    $locations = $userLocations->where('type', 'location')->pluck('location_id')->toArray();
                    $query = $query->whereIn('id', $locations);
                } else {
                    $hierarchyLocations = $userLocations->where('type', $type)->where('action', $action)->pluck('location_id')->toArray();
                    if (empty($hierarchyLocations))
                        $query->where('type', 'not_found');
                }
                foreach ($hierarchyLocations as $location) {
                    $query->orWhere(function ($innerQuery) use ($location) {
                        $innerQuery->whereDescendantOrSelf($location);
                    });
                }
            });
        }
        if (assetCondition($model) && !$noAssetLocationFilter) {
            $location = Session::get('asset_location_id');
            $query = $query->whereDescendantOrSelf($location);
        }
        if ($withOutAssets) {
            $query->whereNotIn('type', ['computer', 'network', 'lone']);
        }

        return $query;
    }


    public function getParentNameAttribute()
    {
        $parent = $this->id;
        $ancestors = getAncestors($parent);
        $html = view('components.ancestors', compact('ancestors'));
        return $html;
    }
}
