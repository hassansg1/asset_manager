<?php

namespace App\Models;

use App\Http\Traits\ParentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    use ParentTrait;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function task()
    {
        return $this->hasOne(Task::class, 'log_id');
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

    public function descriptionItems()
    {
        if ($this->action == 'CREATED') return $this->new() ?? null;
        if ($this->action == 'UPDATED') return $this->changes() ?? null;
        if ($this->action == 'DELETED') [];

        return [];
    }

    public function recId()
    {
        if ($this->action == 'CREATED') return $this->new()->rec_id ?? null;
        if ($this->action == 'UPDATED') return $this->new()->rec_id ?? null;
        if ($this->action == 'DELETED') return $this->old()->rec_id ?? null;

        return null;
    }

    public static function addLog($userId, $model, $modelId, $reason, $tableName, $action, $message, $models, $approved, $approvalRequest = 0)
    {
        $log = new Log();
        $log->user_id = $userId;
        $log->model = $model;
        $log->model_id = $modelId;
        $log->reason = $reason;
        $log->table_name = $tableName;
        $log->action = $action;
        $log->message = $message;
        $log->models = $models;
        $log->approved = $approved;
        $log->approval_request = $approvalRequest;
        $log->save();

        return $log;
    }
}
