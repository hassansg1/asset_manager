<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserId extends Model
{
	use HasFactory;

	public $rules =
	[
		'user_id' => 'required',
		'right_id' => 'required',
	];
    public function user_rights_id(){
        return $this->hasMany(UserRight::class, 'user_id');
    }
	public function saveFormData($item, $request)
	{
		if (isset($request->user_id)) $item->user_id = $request->user_id;
		if (isset($request->description)) $item->description = $request->description;
		$item->save();
		if($request->right_id){
			$rights= $request->right_id;
			if($item && $rights){
				foreach ($rights as $key=>$value) {
					$rights = new UserRight();
					$rights->right_id = $value;
					$rights->user_id = $item->id;
					$rights->save();
				}
			}
		}
		if ($request->user_type == "asset") {
			$assets= $request->asset_id;
			if($item && $assets){
				$asset_user_id = new AssetUserId();
				$asset_user_id->asset_id = $request->asset_id;
				$asset_user_id->user_id = $item->id;
				$asset_user_id->save();
			}
		}
	if($request->user_type == "system"){
		$systems= $request->system_id;
		if($item && $systems){
			$system_user_id = new SystemUserId();
			$system_user_id->system_id = $request->system_id;
			$system_user_id->user_id = $item->id;
			$system_user_id->save();
		}
	}
	return $item;
}
}
