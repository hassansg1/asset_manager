<?php

namespace App\Models;
use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $guarded = [];

    public $rules =
        [
            'short_name' => 'required | max:255',
            'long_name' => 'required | max:255',
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

        $item->save();
        Parentable::addNew(null,null,self::class,$item->id);
        return $item;
    }
}
