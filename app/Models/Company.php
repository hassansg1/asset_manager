<?php

namespace App\Models;

use App\Scopes\LocationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Company extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $table = 'locations';

    public static $type = 'companies';

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        return static::addGlobalScope(new LocationScope(self::$type));
    }


    public $rules =
        [
            'rec_id' => 'required | unique:companies,rec_id',
        ];

    protected $appends = ['show_name', 'parentable_type', 'parentable_id'];

    public function getShowNameAttribute()
    {
        return $this->long_name;
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
        $item->type = self::$type;

        $item->save();
        $item->saveAsRoot();
        return $item;
    }
}
