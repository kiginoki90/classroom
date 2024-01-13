<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'content',
        'created_at',
        'update_at'
    ];

    // １つの投稿は一人のユーザーに属する
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
