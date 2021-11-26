<?php

namespace App\Models;

use App\Http\Traits\Observable;
use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;
    use Observable;

    protected $guarded = [];

    public $rules =
        [
        ];

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {
        if (isset($request->name)) $item->name = $request->name;
        $applicable = isset($request->applicable) && $request->applicable == 'on' ? 1 : 0;
        $item->applicable = $applicable;

        $item->save();
        return $item;
    }
}
