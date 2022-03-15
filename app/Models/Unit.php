<?php

namespace App\Models;

use App\Http\Traits\Observable;
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

    public $rules =
        [
            'rec_id' => 'required | unique:locations,rec_id',
        ];

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
        if (isset($item->id)) $item = Location::find($item->id);
        else $item = new Location();
        if (isset($request->short_name)) $item->short_name = $request->short_name;
        if (isset($request->long_name)) $item->long_name = $request->long_name;
        if (isset($request->rec_id)) $item->rec_id = $request->rec_id;
        if (isset($request->contact_person)) $item->contact_person = $request->contact_person;
        if (isset($request->parent_id)) $item->parent_id = $request->parent_id;
        $item->type = self::$type;

        $parent = Location::find($request->parent_id);
        $item->save();
        if (!isset($item->id)) {
            $newItem = Location::find($item->id);
            $parent->appendNode($newItem);
        }
        return $item;
    }
}
