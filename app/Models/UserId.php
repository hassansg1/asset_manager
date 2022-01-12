<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserId extends Model
{
	use HasFactory;
    protected $fillable = [
        'user_id',
        'parent_id',
        'parent',
        'description',
    ];

    public function rules($parentId = null, $otcmUser = null)
    {
        return [
            'right_id'=>'required',
            'user_id' => 'required|unique:user_ids,user_id,NULL,id,parent_id,' . $parentId
        ];
    }
    public function user_rights_id(){
        return $this->belongsTo(UserRight::class, 'id', 'parent_id');
    }
    public function user_accounts(){
        return $this->belongsTo(UserAccount::class, 'id', 'account_id');
    }
    public function user_id_assets(){
        return $this->belongsTo(Location::class, 'parent_id', 'id');
    }
    public function user_id_systems(){
        return $this->belongsTo(System::class, 'parent_id', 'id');
    }
	public function saveFormData($item, $request)
	{
        if ($request->user_type == "asset") {
		if (isset($request->user_id)) $item->user_id = $request->user_id;
            if (isset($request->asset_id)) $item->parent_id = $request->asset_id;
        $item->parent = "asset";
		if (isset($request->description)) $item->description = $request->description;
		$item->save();
            if($request->right_id){
                $rights= $request->right_id;
                if($item && $rights){
                    $assets_rights = UserRight::updateOrCreate(
                        [
                            'parent_id'   => $item->id,
                        ],
                        [
                            'right_id'     => $request->right_id,
                            'parent_type' => "asset"
                        ]
                    );
                }
            }
		}
	if($request->user_type == "system"){
        if (isset($request->user_id)) $item->user_id = $request->user_id;
        if (isset($request->system_id)) $item->parent_id = $request->system_id;
        $item->parent = "system";
        if (isset($request->description)) $item->description = $request->description;
        $item->save();

        if($request->right_id){
            $rights= $request->right_id;
            if($item && $rights){
                $assets_rights = UserRight::updateOrCreate(
                    [
                        'parent_id'   => $item->id,
                    ],
                    [
                        'right_id'     => $request->right_id,
                        'parent_type' => "system"
                    ]
                );
            }
        }
	}

        if($request->otcm_user_id){
            $otcm_user_id= $request->otcm_user_id;
            if($item && $otcm_user_id){
                $assets_rights = UserAccount::updateOrCreate(
                    [
                        'account_id'   => $item->id,
                    ],
                    [
                        'user_id'     => $request->otcm_user_id,
                    ]
                );
            }
        }

	return $item;
}
}
