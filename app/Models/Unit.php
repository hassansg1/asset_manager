<?php

namespace App\Models;

use App\Http\Traits\Observable;
use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    use ParentTrait;
    use Observable;

    protected $guarded = [];

    public $rules =
        [
            'parent' => 'required',
            'rec_id' => 'required | unique:units,rec_id',
        ];

    protected $appends = ['show_name','parentable_type','parentable_id'];

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
    {if (isset($request->short_name)) $item->short_name = $request->short_name;
        if (isset($request->long_name)) $item->long_name = $request->long_name;
        if (isset($request->rec_id)) $item->rec_id = $request->rec_id;
        if (isset($request->contact_person)) $item->contact_person = $request->contact_person;
        if (isset($request->ot_apn)) $item->ot_apn = $request->ot_apn;

        $item->save();
        $this->updateParent($request,$item);
        return $item;
    }
}
