<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Settings extends Model
{
    use HasFactory;

     protected $fillable = [
    'title',
    'item_per_page',
    'logo',
    'logo_icon',
  ];

    public $rules =
	[
		'title' => 'required',
		'item_per_page' => 'required',
	];

}
