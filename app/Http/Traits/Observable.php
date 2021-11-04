<?php

namespace App\Http\Traits;

use App\Models\Notification;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait Observable
{
    // bootObservable() will be called on model instantiation automatically
    public static function bootObservable()
    {
        static::saved(function (Model $model) {
            // create or update?
            if ($model->wasRecentlyCreated) {
                static::logChange($model, 'CREATED');
            } else {
                if (!$model->getChanges()) {
                    return;
                }
                static::logChange($model, 'UPDATED');
            }
        });

        static::deleted(function (Model $model) {
            static::logChange($model, 'DELETED');
        });
    }

    public static function logChange(Model $model, string $action)
    {
        if ($action == 'CREATED') {
            DB::table($model->getTable())->where('id', $model->id)->delete();
        } elseif ($action == 'UPDATED') {
            $arr = array_diff_key($model->getOriginal(), ['id' => 'aa']);
            DB::table($model->getTable())->where('id', $model->id)->update($arr);
        } elseif ($action == 'DELETED') {
            DB::table($model->getTable())->insert($model->getOriginal());
        }
       $log =  Log::create([
            'user_id' => Auth::user()->id ?? null,
            'model' => static::class,
            'model_id' => $model->id,
            'table_name' => $model->getTable(),
            'action' => $action,
            'reason' => Session::get('reason') ?? '',
            'message' => self::logSubject($model),
            'approval_request' => 1,
            'models' => json_encode([
                'new' => $action !== 'DELETED' ? $model->getAttributes() : null,
                'old' => $action !== 'CREATED' ? $model->getOriginal() : null,
                'changed' => $action === 'UPDATED' ? $model->getChanges() : null,
            ])
        ]);

        Notification::addNotification(Notification::APPROVAL_REQUEST, 1);
        Task::addTask(Notification::APPROVAL_REQUEST, 1,$log->id,$action.' '.$model->getTable(). ' entry');

        Session::put('approvalRequest', 1);
    }

    /**
     * String to describe the model being updated / deleted / created
     * Override this in the model class
     * @return string
     */
    public static function logSubject(Model $model): string
    {
        return static::logImplodeAssoc($model->attributesToArray());
    }

    public static function logImplodeAssoc(array $attrs): string
    {
        $l = [];
        foreach ($attrs as $k => $v) {
            $l[$k] = $v;
        }
        return json_encode($l);
    }
}
