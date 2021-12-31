<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUserId extends Model
{
	use HasFactory;

	public function asset(){
		return $this->belongsTo(Location::class, 'asset_id', 'id');
	}

    public function account_id(){
        return $this->belongsTo(UserId::class, 'user_id', 'id');
    }

    public function asset_right(){
        return $this->belongsTo(UserRight::class, 'id', 'parent_id');
    }

    public function users(){
        return $this->belongsTo(UserAccount::class, 'user_id', 'account_id');
    }
}
