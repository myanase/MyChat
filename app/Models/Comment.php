<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = "comment_id";

    protected $fillable = [
        'user_id', 'comment', 'del_flg'
    ];

    protected $guarded = [
        'comment_id','created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];
}
