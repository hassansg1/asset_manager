<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clause extends Model
{
    use HasFactory;

    public $rules =
        [
            'number' => 'required | unique:clauses,number',
        ];

    protected $guarded = [];

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function childs()
    {
        return $this->hasMany(Clause::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Clause::class, 'parent_id');
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {
        if (isset($request->number)) $item->number = $request->number;
        if (isset($request->title)) $item->title = $request->title;
        if (isset($request->description)) $item->description = $request->description;
        if (isset($request->standard_id)) $item->standard_id = $request->standard_id;

        $item->save();
        return $item;
    }
}
