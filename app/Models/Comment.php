<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'traffic_accident_id',
        'comment_text',
        'total_good',
        'total_bad',
    ];

    public function traffic_accident()
    {
        return $this->belongsTo(TrafficAccident::class);
    }
}
