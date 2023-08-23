<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficAccident extends Model
{
    use HasFactory;

    // テーブル名を指定（デフォルトの命名規則を使用する場合は不要）
    // protected $table = 'traffic_accidents';

    // モデルに関連する属性の指定（fillメソッドを使用する際に必要）
    protected $fillable = [
        'user_id',
        'accident_place',
        'accident_time',
        'accident_detail',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
