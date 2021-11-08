<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class ComplianceDataLocation extends Model
{
	use HasFactory;
	protected $table = 'compliance_data_location';
    protected $guarded = [];

}