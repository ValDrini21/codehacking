<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'is_active',
        'author',
        'photo',
        'email',
        'body'
    ];

    public function replies() {
        return $this->hasMany('App\Models\CommentReply');
    }

    public function post() {
        return $this->belongsTo('App\Models\Post');
    }

}
