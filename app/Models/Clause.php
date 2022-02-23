<?php

namespace App\Models;

use App\Http\Traits\Observable;
use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clause extends Model
{
    use HasFactory;
    use Observable;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function rules($standardId = null)
    {
        return [
            'number' => 'required|unique:clauses,number,NULL,id,standard_id,' . $standardId,
        ];
    }

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
