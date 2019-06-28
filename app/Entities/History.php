<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
