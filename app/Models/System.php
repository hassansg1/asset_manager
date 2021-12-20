<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
	use HasFactory;

	public $rules =
	[
		'name' => 'required',
		'system_type' => 'required',
		'asset_id' => 'required',
	];

	public function system_assets(){
		return $this->hasMany(SystemAssets::class, 'system_id');
	}

	public function saveFormData($item, $request)
	{
		if (isset($request->system_type)) $item->system_type = $request->system_type;
		if (isset($request->name)) $item->name = $request->name;
		if (isset($request->description)) $item->description = $request->description;
		$item->save();
		$assests= $request->asset_id;
		if($item && $assests){
				$system_assets =  new SystemAssets();
				$system_assets->system_id = $item->id;
				$system_assets->asset_id = $request->asset_id;
				$system_assets->save();
		}
		return $item;
	}
}
