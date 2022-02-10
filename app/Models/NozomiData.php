<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NozomiData extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPropertiesAttribute()
    {
        return json_decode($this->data);
    }
}
