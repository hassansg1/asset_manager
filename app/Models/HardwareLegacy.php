<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareLegacy extends Model
{
    use HasFactory;

    protected $table = 'hardware_legacies';

    protected $guarded = [];

    public $rules =
        [
            'hardware_make' => 'required',
            'hardware_model' => 'required',
            'part_number' => 'required',
            'status' => 'required',
        ];


    /**
     * @param $name
     * @param bool $returnId
     * @return mixed
     */
    /**
     * @param $value
     */

    public function saveFormData($item, $request)
    {
        if (isset($request->hardware_make)) $item->hardware_make = $request->hardware_make;
        if (isset($request->hardware_model)) $item->hardware_model = $request->hardware_model;
        if (isset($request->part_number)) $item->part_number = $request->part_number;
        if (isset($request->status)) $item->status = $request->status;
        $item->save();
        return $item;
    }
}
