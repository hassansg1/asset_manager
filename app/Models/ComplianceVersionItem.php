<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplianceVersionItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function complianceVersionAttachmentId(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ComplianceVersionItemAttachment::class, 'id', 'compliance_version_item_id');
    }
}
