<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fileLink()
    {
        return url('/docs/' . $this->fileName);
    }
}
