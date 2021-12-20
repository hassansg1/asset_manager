<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
	use HasFactory;

	public $rules =
	[
		'name' => 'required | max:255',
	];

	public function saveFormData($item, $request)
	{
		if (isset($request->name)) $item->name = $request->name;
		$item->save();
		return $item;
	}
}
