<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
     public function saveFormData($item, $request)
    {
        if (isset($request->title)) $item->title = $request->title;

        $item->save();
        return $item;
    }
}
