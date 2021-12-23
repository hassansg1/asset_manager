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
		if (isset($request->description)) $item->description = $request->description;
		$item->save();
		return $item;
	}
}
