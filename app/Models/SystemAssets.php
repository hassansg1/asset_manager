<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemAssets extends Model
{
    use HasFactory;
    public function assets(){
		return $this->bleongsTo(Computer::class, 'asset_id');
	}
}
