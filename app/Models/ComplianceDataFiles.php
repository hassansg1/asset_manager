<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplianceDataFiles extends Model
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
}
