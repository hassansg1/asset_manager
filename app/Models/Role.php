<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class Role extends Authenticatable
{
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];


    public $rules =
        [
            'name' => 'required | max:255',
        ];


    public function parentName()
    {
        return '';
    }


    /**
     * @param $request
     * @param $item
     */
    function updateLocations($request, $item)
    {
        UserLocation::where(['role_id' => $item->id])->delete();
        if ($request->location)
            foreach ($request->location as $location) {
                UserLocation::create([
                    'type' => 'location',
                    'location_id' => $location,
                    'role_id' => $item->id,
                    'action' => '',
                ]);
            }
        if ($request->permissions)
            foreach ($request->permissions as $type => $permission) {
                foreach ($permission as $action => $locations)
                    foreach ($locations as $location) {
                        UserLocation::create([
                            'type' => $type,
                            'location_id' => $location,
                            'role_id' => $item->id,
                            'action' => $action,
                        ]);
                    }
            }
    }

    public function locations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserLocation::class, 'role_id');
    }

    public static function locationsArray(): array
    {
        $locations = [];
        if (checkIfSuperAdmin()) {
            $locations = Location::where('parent_id', null)->pluck('id')->toArray();
        } else {
            $roles = Auth::user()->roles->pluck('id')->toArray();
            if ($roles) {
                $locations = UserLocation::whereIn('role_id', $roles)->where('type', 'location')->pluck('location_id')->toArray();
            }
        }
        return $locations;
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {
//        if (isset($request->name)) $item->name = $request->name;
//        $item->guard_name = 'web';
//        $item->save();

        $role = \Spatie\Permission\Models\Role::updateOrCreate(["name" => $request->name], ["name" => $request->name])
            ->syncPermissions([$request->allow_permissions]);
        $this->updateLocations($request, $role);

        return $item;
    }
}
