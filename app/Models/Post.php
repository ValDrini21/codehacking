<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    use Sluggable;

    
    public function sluggable() :array {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ],
        ];
    }

    protected $fillable = [
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function photo() {
        return $this->belongsTo('App\Models\Photo');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
