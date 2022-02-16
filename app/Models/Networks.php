<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use App\Http\Traits\Observable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Networks extends Model
{
    use HasFactory;
    use ParentTrait;
    use Observable;

    protected $table = 'networks_list';

    protected $guarded = [];

    public $rules =
        [
            'name' => 'required | max:255',
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
        if (isset($request->name)) $item->name = $request->name;
        if (isset($request->start_ip)) $item->start_ip = $request->start_ip;
        if (isset($request->end_ip)) $item->end_ip = $request->end_ip;
        $item->save();
        Parentable::addNew(null, null, self::class, $item->id);
        return $item;
    }
}
