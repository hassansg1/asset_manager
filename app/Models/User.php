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

    public function account(){
        return $this->belongsTo(UserAccount::class, 'id', 'user_id');
    }
    public function userAccount(){
        return $this->belongsTo(UserAccount::class, 'id', 'user_id');
    }

    public function user_unit(){
        return $this->belongsTo(Location::class, 'unit_id', 'id');
    }
    public function user_site(){
        return $this->belongsTo(Location::class, 'site_id', 'id');
    }

    public function user__sub_site(){
        return $this->belongsTo(Location::class, 'sub_site_id', 'id');
    }

    public function account_id(){
        return $this->belongsTo(UserId::class, 'user_id', 'id');
    }

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
            'last_name' => 'required | max:255',
            'username' => 'required | max:255',
            'email' => 'required | email',
            'password' => [
                'required',
                'string',
                'min:7',             // must be at least 7 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&_-]/', // must contain a special character
            ],
        ];


    public function parentName()
    {
        return '';
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
        if (isset($request->username)) $item->username = $request->username;
        if (isset($request->password)) $item->password = Hash::make($request->password);
        if (isset($request->dob)) $item->dob = Hash::make($request->dob);
        $item->save();
        if (isset($request->roles)) {
            $item->syncRoles($request->roles);
        }
        return $item;
    }

    public function userNotifications()
    {
        return $this->belongsToMany(Notification::class)->orderBy('created_at', 'DESC');
    }

    public function userFirstThreeNotifications()
    {
        return $this->belongsToMany(Notification::class)->skip(0)->take(3)->orderBy('created_at', 'DESC');
    }
}
