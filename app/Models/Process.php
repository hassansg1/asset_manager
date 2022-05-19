<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;
    public $rules =
        [
            'process' => 'required',
            'criticality' => 'required',
        ];

    /**
     * @param $value
     */

    public function saveFormData($item, $request)
    {
        if (isset($request->process)) $item->process = $request->process;
        if (isset($request->criticality)) $item->criticality = $request->criticality;
        if (isset($request->comment)) $item->comment = $request->comment;
        $item->save();
        return $item;
    }
}
