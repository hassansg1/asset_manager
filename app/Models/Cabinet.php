<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $guarded = [];

    public $rules =
        [
            'rec_id' => 'required | unique:cabinets,rec_id',
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
        if (isset($request->rec_id)) $item->rec_id = $request->rec_id;
        $item->save();
        $this->updateParent($request,$item);
        return $item;
    }
}
