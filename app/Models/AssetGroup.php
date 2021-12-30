<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetGroup extends Model
{
	use HasFactory;

	public $rules =
	[
		'name' => 'required',
	];

	public function saveFormData($item, $request)
	{
		if (isset($request->name)) $item->name = $request->name;
		if (isset($request->description)) $item->description = $request->description;
		$item->save();
		$assets= $request->asset_id;
		if($item && $assets){
			foreach ($assets as $key=>$value) {
				$asset_assecc_group = new AssetAccessGroup();
				$asset_assecc_group->asset_id = $value;
				$asset_assecc_group->group_id = $item->id;
				$asset_assecc_group->save();
			}
		}
		return $item;
	}
}
