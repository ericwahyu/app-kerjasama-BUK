<?php

namespace App\Console\Commands;

use App\Models\Document;
use App\Models\Notification;
use App\Models\User;
use App\Models\UserNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class NotificationDocument extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notification-document';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $userAdmin = User::all();
        $data = Document::whereStatus(1)->get();

        $start = Carbon::parse(date('Y-m-d', strtotime(Carbon::now())));;

        foreach($data as $datas){
            $end = Carbon::parse(date('Y-m-d', strtotime($datas->end_date)));
            $countDay = $start->diffInDays($end);

            $user_notifikasi = UserNotification::whereDocumentId($datas->id)->first();

            if(!$user_notifikasi){
                if($countDay <= 30){
                    foreach($userAdmin as $admin){
                        $notifikasi = new Notification();
                        $notifikasi->message = "Memberitahuan Dokumen Kerjasama jenis ". $datas->type->name ." bahwa kurang dari 30 akan kadaluarsa";
                        $notifikasi->save();

                        $addNotifikasi = new UserNotification();
                        $addNotifikasi->user_id = $admin->id;
                        $addNotifikasi->notification_id = $notifikasi->id;
                        $addNotifikasi->document_id = $datas->id;
                        $addNotifikasi->save();
                    }
                }
            }elseif($user_notifikasi){
                if($countDay <= 1){
                    $dokumen = Document::find($datas->id);
                    $dokumen->status = 0;
                    $dokumen->save();

                    foreach($userAdmin as $admin){
                        $notifikasi = new Notification();
                        $notifikasi->message = "Memberitahuan Dokumen Kerjasama jenis ". $datas->type->name ." sudah kadaluarsa";
                        $notifikasi->save();

                        $addNotifikasi = new UserNotification();
                        $addNotifikasi->user_id = $admin->id;
                        $addNotifikasi->notification_id = $notifikasi->id;
                        $addNotifikasi->document_id = $datas->id;
                        $addNotifikasi->save();
                    }
                }
            }

            if($datas->end_date <= Carbon::now()->format('Y-m-d')){
                $dokumen = Document::find($datas->id);
                $dokumen->status = 0;
                $dokumen->save();

                foreach($userAdmin as $admin){
                    $notifikasi = new Notification();
                    $notifikasi->message = "Memberitahuan Dokumen Kerjasama jenis ". $datas->type->name ." sudah kadaluarsa";
                    $notifikasi->save();

                    $addNotifikasi = new UserNotification();
                    $addNotifikasi->user_id = $admin->id;
                    $addNotifikasi->notification_id = $notifikasi->id;
                    $addNotifikasi->document_id = $datas->id;
                    $addNotifikasi->save();
                }
            }
        }
        Log::info('Successfully sent daily quote to everyone.');
    }
}
