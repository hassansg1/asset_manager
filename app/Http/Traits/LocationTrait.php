<?php

namespace App\Http\Traits;

use App\Models\AssetFunction;
use App\Models\AssetMake;
use App\Models\AssetSecurityZone;
use App\Models\OperatingSystem;

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
    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class, 'operating_system');
    }
}
