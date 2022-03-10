<?php

namespace App\Models;

use App\Scopes\LocationPermissionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Location extends Model
{
    use HasFactory;

    use NodeTrait;

    protected static function boot()
    {
        parent::boot();

        return static::addGlobalScope(new LocationPermissionScope);
    }

    public static function getTypeToModel($type)
    {
        $arr = [
            'companies' => 'Company',
            'units' => 'Unit',
            'sites' => 'Site',
        ];

        return $arr[$type] ?? '';
    }

    protected $guarded = [];

    protected $appends = ['text'];

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    public function getTextAttribute()
    {
        return $this->short_name != "" ? $this->short_name : $this->name;
    }

    public function softwares()
    {
        return $this->hasMany(InstalledSoftware::class, 'asset_id');
    }

    public function getParentNameAttribute()
    {
        $parent = $this->id;
        $ancestors = getAncestors($parent);
        $html = view('components.ancestors', compact('ancestors'));
        return $html;
    }
}
