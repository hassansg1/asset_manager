<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['combine_name'];

    public function getCombineNameAttribute()
    {
        return $this->locationable_type . "??" . $this->locationable_id;
    }

    public function getSelfNameAttribute()
    {
        $obj = $this->locationable_type::find($this->locationable_id);
        if ($obj)
            return $obj->show_name;
        return null;
    }

    public function getSelfPermissionAttribute()
    {
        $obj = $this->locationable_type::find($this->locationable_id);
        if ($obj)
            return  get_class($obj) . $obj->id;
        return null;
    }

    public static function addNew($locationAbleType, $locationAbleId, $useId)
    {
        $arr = [
            'locationable_type' => $locationAbleType,
            'locationable_id' => $locationAbleId,
            'user_id' => $useId
        ];

        return self::create($arr);
    }
}
