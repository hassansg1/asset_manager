<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareLegacy extends Model
{
    use HasFactory;

    protected $table = 'hardware_legacies';

    protected $guarded = [];

    public function rules($part_number = null)
    {
        return [
            'hardware_make' => 'required|unique:hardware_legacies,hardware_make,NULL,id,hardware_model,' . $part_number,
            'part_number' => 'required',
        ];
    }

    public $rules =
        [
            'hardware_make' => 'required',
            'part_number' => 'required',
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
        if (isset($request->latest_firmware)) $item->latest_firmware = $request->latest_firmware;
        $item->save();
        return $item;
    }
}
