<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    const APPROVAL_REQUEST = 'pending';
    const APPROVAL_REQUEST_APPROVED = 'approved';

    public static function getTaskType($key)
    {
        $notificationTypes = [
            'approval_request' => 'pending',
            'approval_request_close' => 'close',
        ];

        return $notificationTypes[$key] ?? $key;
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function log()
    {
        return $this->hasOne(Log::class, 'log_id');
    }

    public static function addTask($type, $userId, $logId, $name = null)
    {
        $type = self::getTaskType($type);

        $task = new Task();
        $task->name = $name;
        $task->user_id = $userId;
        $task->log_id = $logId;
        $task->status = $type;
        $task->save();
        return $task;
    }
}
