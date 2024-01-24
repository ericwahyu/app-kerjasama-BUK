<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function userNotications()
    {
        return $this->hasMany(UserNotification::class, 'notification_id', 'id');
    }
}
