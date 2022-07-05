<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareLegacy extends Model
{
    use HasFactory;

    protected $table = 'software_legacies';

    protected $guarded = [];

    public $rules =
        [
            'software_type' => 'required',
            'software_name' => 'required',
            'software_version' => 'required',
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
        if (isset($request->software_type)) $item->software_type = $request->software_type;
        if (isset($request->software_name)) $item->software_name = $request->software_name;
        if (isset($request->software_version)) $item->software_version = $request->software_version;
        if (isset($request->status)) $item->status = $request->status;
        $item->save();
        return $item;
    }
}
