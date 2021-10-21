<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTypeAttribute()
    {
        $exp = explode('\\', $this->model);
        return $exp[count($exp) - 1];
    }

    public function item()
    {
        return json_decode($this->message);
    }

    public function old()
    {
        return json_decode($this->models)->old;
    }


    public function new()
    {
        return json_decode($this->models)->new;
    }

    public function changes()
    {
        return json_decode($this->models)->changed;
    }
}
