<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserLocation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getLocations($type, $user = null)
    {
        if (!$user) $user = Auth::user();
        $roles = $user->roles->pluck('id')->toArray();

        $locations = UserLocation::whereIn('role_id', $roles)->where('type', $type)->pluck('location_id')->toArray();

        return $locations;
    }
}
