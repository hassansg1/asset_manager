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

        $item->save();
        Parentable::addNew(null, null, self::class, $item->id);
        return $item;
    }
}
