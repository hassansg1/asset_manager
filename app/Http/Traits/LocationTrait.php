<?php

namespace App\Http\Traits;

use App\Models\AssetFunction;
use App\Models\AssetMake;
use App\Models\AssetSecurityZone;

trait LocationTrait
{

    public function assetFunction()
    {
        return $this->belongsTo(AssetFunction::class, 'function');
    }
    public function assetMake()
    {
        return $this->belongsTo(AssetMake::class, 'make');
    }
    public function assetSecurityZone()
    {
        return $this->belongsTo(AssetSecurityZone::class, 'security_zone');
    }
}
