<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplianceVersionItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attachments()
    {
        return $this->hasMany(ComplianceVersionItemAttachment::class,'compliance_version_item_id');
    }

    public function clause()
    {
        return $this->belongsTo(StandardClause::class,'clause_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }
    public function version()
    {
        return $this->belongsTo(ComplianceVersion::class,'compliance_version_id');
    }
}
