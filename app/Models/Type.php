<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    public function documents()
    {
        return $this->hasMany(Document::class, 'type_id', 'id');
    }
}
