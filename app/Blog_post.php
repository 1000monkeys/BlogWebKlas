<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'slug', 'post', 'view_count'
    ];

    public function blog_comment(){
        return $this->hasMany('App\Blog_comment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
