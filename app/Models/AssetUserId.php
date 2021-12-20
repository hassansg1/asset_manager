<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetUserId extends Model
{
	use HasFactory;

	public function asset(){
		return $this->belongsTo(Computer::class, 'asset_id', 'id');
	}
}
