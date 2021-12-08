<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
	use HasFactory;

	public $rules =
	[
		'user_id' => 'required',
	];

	public function user(){
		return $this->belongsTo(User::class, 'user_id');
	}


	public function saveFormData($item, $request)
    {
        if (isset($request->user_id)) $item->user_id = $request->user_id;
        $item->save();
        return $item;
    }
}
