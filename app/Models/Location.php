<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

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

    public function getParentNameAttribute()
    {
        $parent = $this->parent;
        if ($parent)
            return $parent->long_name != "" ? $parent->long_name : $parent->name;

        return "";
    }
}
