<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $notification = '';
        $notifikasi = Notification::join('user_notifications', 'notifications.id', '=', 'user_notifications.notification_id')->where('user_notifications.user_id', Auth::user()->id)->select('notifications.*')->latest()->get();
        foreach($notifikasi as $notif){
            // dd($notif);
            $user_notifikasi = UserNotification::whereNotificationId($notif->id)->whereUserId(Auth::user()->id)->first();

            if($user_notifikasi->read_at == 0){
                $color = '#E8E7FF';
            }elseif($user_notifikasi->read_at == 1){
                $color = '#FFFFFF';
            }

            $created = new Carbon($notif->created_at);
            $now = Carbon::now();
            $difference = ($created->diff($now)->days < 1)
                ? 'HARI INI'
                : $created->diffForHumans($now);

            $notification .= '
                <a href=" '. route('show.document', $user_notifikasi->document_id) .'" class="dropdown-item" style="background-color: '.$color.'">
                    <div class="dropdown-item-icon bg-info text-white">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        '.$notif->message.'
                        <div class="time text-primary">'.$difference.'</div>
                    </div>
                </a>';
        }

        $notifikasiReadAt = UserNotification::where('read_at', 0)->first();
        if($notifikasiReadAt != null){
            $readAt = 0;
        }else{
            $readAt = 1;
        }
            // dd($readAt);
        $data = array(
            'data_notifikasi' => $notification,
            'data_readAt' => $readAt
        );
        echo json_encode($data);
    }
}
