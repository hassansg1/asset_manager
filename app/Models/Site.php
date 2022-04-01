<?php

namespace App\Models;

use App\Http\Traits\Observable;
use App\Scopes\LocationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Site extends Model
{
    use HasFactory;
    use Observable;
    use NodeTrait;

    protected $table = 'locations';

    public static $type = 'sites';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        return static::addGlobalScope(new LocationScope(self::$type));
    }

    public $rules =
        [
            'rec_id' => 'required | unique:locations,rec_id',
        ];

    protected $appends = ['show_name', 'parentable_type', 'parentable_id'];

    public function getShowNameAttribute()
    {
        return $this->name;
    }

    public function getParentableTypeAttribute()
    {
        return $this->name;
    }
    public function getParentableIdAttribute()
    {
        return '';
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
        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->arabic_name)) $item->arabic_name = $request->arabic_name;
        if (isset($request->rec_id)) $item->rec_id = $request->rec_id;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->descriptive_location)) $item->descriptive_location = $request->descriptive_location;
        if (isset($request->location_dec_coordinate)) $item->location_dec_coordinate = $request->location_dec_coordinate;
        if (isset($request->location_deg_coordinate)) $item->location_deg_coordinate = $request->location_deg_coordinate;
        if (isset($request->location_google_link)) $item->location_google_link = $request->location_google_link;
        if (isset($request->main_process_equipment)) $item->main_process_equipment = $request->main_process_equipment;
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
