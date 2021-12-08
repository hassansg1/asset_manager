<?php

namespace App\Models;

use App\Http\Traits\Observable;
use App\Http\Traits\ParentTrait;
use App\Scopes\LocationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Building extends Model
{
    use HasFactory;
    use Observable;
    use NodeTrait;

    protected $table = 'locations';

    public static $type = 'buildings';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        return static::addGlobalScope(new LocationScope(self::$type));
    }

    public $rules =
        [
            'rec_id' => 'required | unique:buildings,rec_id',
        ];

    protected $appends = ['show_name', 'parentable_type', 'parentable_id'];

    public function getShowNameAttribute()
    {
        return $this->name;
    }


    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {

        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->rec_id)) $item->rec_id = $request->rec_id;

        $item->save();
        $this->updateParent($request, $item);
        return $item;
    }
}
