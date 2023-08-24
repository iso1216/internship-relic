<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrafficAccident extends Model
{
    protected $fillable = [
        'user_id',
        'accident_place',
        'accident_time',
        'accident_detail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
