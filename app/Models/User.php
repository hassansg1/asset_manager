<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['name'];

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->first_name . " " . $this->last_name;
    }

    public $rules =
        [
            'first_name' => 'required | max:255',
            'email' => 'required | email',
        ];


    public function parentName()
    {
        return '';
    }

    public function locations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserLocation::class, 'user_id');
    }

    public function locationsArray()
    {
        return $this->locations->pluck('combine_name')->toArray();
    }

    /**
     * @param $request
     * @param $item
     */
    function updateLocations($request, $item)
    {
        UserLocation::where(['user_id' => $item->id])->delete();
        if (isset($request->location)) {
            foreach ($request->location as $location) {
                $prt = explode('??', $location);
                $item->parentable_type = $prt[0] ?? '';
                $item->parentable_id = $prt[1] ?? '';
                UserLocation::addNew($prt[0] ?? null, $prt[1] ?? null, $item->id);
            }
        }
    }

    /**
     * @param $request
     * @param $item
     */
    function updateAssetPermissions($request, $item)
    {
        $item->permissions()->delete();
        if (isset($request->permissions)) {
            foreach ($request->permissions as $entry) {
                Permission::updateOrCreate(["name" => $entry], ["name" => $entry, 'guard_name' => 'web', 'group' => $entry]);
                $item->givePermissionTo($entry);
            }
        }
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {
        if (isset($request->first_name)) $item->first_name = $request->first_name;
        if (isset($request->last_name)) $item->last_name = $request->last_name;
        if (isset($request->mobile_no)) $item->mobile_no = $request->mobile_no;
        if (isset($request->email)) $item->email = $request->email;
        if (isset($request->password)) $item->password = Hash::make($request->password);
        if (isset($request->dob)) $item->dob = Hash::make($request->dob);
        if (isset($request->roles)) {
            $item->syncRoles($request->roles);
        }

        $item->save();
        $this->updateLocations($request, $item);
        $this->updateAssetPermissions($request, $item);
        return $item;
    }

    public function userNotifications()
    {
        return $this->belongsToMany(Notification::class)->orderBy('created_at','DESC');
    }
    public function userFirstThreeNotifications()
    {
        return $this->belongsToMany(Notification::class)->skip(0)->take(3)->orderBy('created_at','DESC');
    }
}
