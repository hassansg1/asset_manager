<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserLocation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getLocations($type = null, $user = null)
    {
        if (!$user) $user = Auth::user();
        $roles = $user->roles->pluck('id')->toArray();

        $locations = UserLocation::with('location')->whereIn('role_id', $roles);

        if ($type)
            $locations = $locations->where('type', $type);

        return $locations->get();
    }

    public function getIdentifierAttribute()
    {
        return $this->location_id . $this->type . $this->action;
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
