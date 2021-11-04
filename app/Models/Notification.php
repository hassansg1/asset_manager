<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    const APPROVAL_REQUEST = 'approval_request';
    const APPROVAL_REQUEST_APPROVED = 'approval_request_approved';
    const APPROVAL_REQUEST_REJECTED = 'approval_request_rejected';

    public static function getNotificationType($key)
    {
        $notificationTypes = [
            'approval_request' => 'approval_request',
            'approval_request_approved' => 'approval_request_approved',
            'approval_request_rejected' => 'approval_request_rejected',
        ];

        return $notificationTypes[$key] ?? $key;
    }

    public static function getNotificationHeading($key)
    {
        $notificationTypes = [
            'approval_request' => 'New Change Approval Request',
            'approval_request_approved' => 'Change Request Approved',
            'approval_request_rejected' => 'Change Request Rejected',
        ];

        return $notificationTypes[$key] ?? $key;
    }

    public static function getNotificationMessage($key)
    {
        $notificationTypes = [
            'approval_request' => 'You have received a new change approval request.',
            'approval_request_approved' => 'Your Change request is Approved by the Admin',
            'approval_request_rejected' => 'Your Change request is Rejected by the Admin',
        ];

        return $notificationTypes[$key] ?? $key;
    }

    public static function getNotificationLink($key)
    {
        $notificationTypes = [
            'approval_request' => 'You have received a new change approval request.',
            'approval_request_approved' => 'Changes Approved',
            'approval_request_rejected' => 'Changes Rejected',
        ];

        return $notificationTypes[$key] ?? $key;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function addNotification($type, $userId, $heading = null, $message = null, $link = null)
    {
        $type = self::getNotificationType($type);
        if (!$heading) $heading = self::getNotificationHeading($type);
        if (!$message) $message = self::getNotificationMessage($type);
        if (!$link) $link = self::getNotificationLink($type);

        $notification = new Notification();
        $notification->type = $type;
        $notification->heading = $heading;
        $notification->message = $message;
        $notification->link = $link;
        $notification->created_by = 0;
        $notification->save();

        DB::table('notification_user')->insert([
            'user_id' => $userId,
            'notification_id' => $notification->id
        ]);

        return $notification;
    }
}
