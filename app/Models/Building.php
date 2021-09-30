<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $guarded = [];

    public $rules =
        [
            'name' => 'required | max:255',
        ];

    protected $appends = ['show_name','parentable_type','parentable_id'];

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
        if (isset($request->code)) $item->code = $request->code;

        $item->save();
        $this->updateParent($request,$item);
        return $item;
    }
}
