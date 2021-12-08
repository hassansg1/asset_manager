<?php

namespace App\Models;

use App\Http\Traits\Observable;
use App\Http\Traits\ParentTrait;
use App\Scopes\LocationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Unit extends Model
{
    use HasFactory;
    use Observable;
    use NodeTrait;

    protected $table = 'locations';

    public static $type = 'units';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        return static::addGlobalScope(new LocationScope(self::$type));
    }

    public function getShowNameAttribute()
    {
        return $this->long_name;
    }


    public function complianceItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ComplianceVersionItem::class, 'location_id');
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {
        if (isset($request->short_name)) $item->short_name = $request->short_name;
        if (isset($request->long_name)) $item->long_name = $request->long_name;
        if (isset($request->rec_id)) $item->rec_id = $request->rec_id;
        if (isset($request->contact_person)) $item->contact_person = $request->contact_person;

        $item->save();
        $this->updateParent($request,$item);
        return $item;
    }
}
