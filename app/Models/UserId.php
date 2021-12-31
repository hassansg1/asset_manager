<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserId extends Model
{
	use HasFactory;

	public $rules =
	[
		'user_id' => 'required|unique:user_ids',
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
		if ($request->user_type == "asset") {
			$assets= $request->asset_id;
			if($item && $assets){
				$asset_user_id = new AssetUserId();
				$asset_user_id->asset_id = $request->asset_id;
				$asset_user_id->user_id = $item->id ;
				$asset_user_id->save();
			}
            if($request->right_id){
                $rights= $request->right_id;
                if($item && $rights){
//                    foreach ($rights as $key=>$value) {
                        $assets_rights = new UserRight();
                        $assets_rights->right_id = $request->right_id;
                        $assets_rights->parent_id = $asset_user_id->id;
                        $assets_rights->parent_type = "asset";
                        $assets_rights->save();
//                    }
                }
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
        if($request->right_id){
            $rights= $request->right_id;
            if($item && $rights){
                $systrem_rights = new UserRight();
                $systrem_rights->right_id = $request->right_id;
                $systrem_rights->parent_id = $system_user_id->id;
                $systrem_rights->parent_type = "system";
                $systrem_rights->save();
            }
        }
        $system_assets = SystemAssets::select('asset_id')->where('system_id', $request->system_id)->get();
        if ($item  && $system_assets){
            foreach($system_assets as $system_asset) {
                $asset_user_id = new AssetUserId();
                $asset_user_id->asset_id = $system_asset->asset_id;
                $asset_user_id->user_id = $item->id ;
                $asset_user_id->save();

                $assets_rights = new UserRight();
                $assets_rights->right_id = $request->right_id;
                $assets_rights->parent_id = $asset_user_id->id;
                $assets_rights->parent_type = "asset";
                $assets_rights->save();
            }
        }
	}
	return $item;
}
}
