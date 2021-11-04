<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplianceData extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {

    }
    public function compliance(){
        return $this->belongsTo(Compliance::class,'compliance_id');
    }
}
