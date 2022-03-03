<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplianceVersionItemAttachment extends Model
{
    use HasFactory;

    protected $table = "compliance_version_item_attachments";

    protected $guarded = [];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class,'attachment_id');
    }
}
