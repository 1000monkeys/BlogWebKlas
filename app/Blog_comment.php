<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'blog_id', 'comment'
    ];

    public function blog_post(){
        return $this->hasMany('App\Blog_post');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
