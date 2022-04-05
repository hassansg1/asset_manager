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

    public function rules($parentId = null)
    {
        return [
            'right_id'=>'required',
            'condition' => 'required',
            'user_id' => 'required|unique:user_ids,user_id,NULL,id,parent_id,'.$parentId,
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
        $res=UserRight::where('parent_id',$request->id)->delete();
        if (isset($request->user_id)) $item->user_id = $request->user_id;
        if ($request->user_type == "asset") {
            if (isset($request->asset_id)) $item->parent_id = $request->asset_id;
            $item->parent = $request->user_type;
        }else{
            if (isset($request->system_id)) $item->parent_id = $request->system_id;
            $item->parent = $request->user_type;
        }
        if (isset($request->condition)) $item->condition = $request->condition;
        if (isset($request->approvel_expirey_date)) $item->approvel_expirey_date = $request->approvel_expirey_date;
        if (isset($request->description)) $item->description = $request->description;
        $item->save();

            $rights= $request->right_id;
            if($item && $rights){
                foreach ($rights as $right){
                    $assets_rights = new UserRight();
                    $assets_rights->parent_id = $item->id;
                    $assets_rights->right_id = $right;
                    $assets_rights->parent_type = $item->parent;
                    $assets_rights->save();
                }
            }

        if($request->otcm_user_id){
            $otcm_user_id= $request->otcm_user_id;
            if($item && $otcm_user_id){
//                foreach ($otcm_user_id as $key=>$value)  {
                    $assets_rights = new UserAccount();
                    $assets_rights->account_id = $item->id;
                    $assets_rights->user_id   = $otcm_user_id;
                    $assets_rights->save();
//                }
            }
        }

	return $item;
}
}
