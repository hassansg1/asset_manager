<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use function Symfony\Component\Translation\t;

class Location extends Model
{
    use HasFactory;

    use NodeTrait;

    protected $guarded = [];

    protected $appends = ['text', 'parent_name'];

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
