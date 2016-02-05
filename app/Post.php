<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = "posts";

    protected $fillable = ['content'];

    public function getTopic() {
        return $this->belongsTo('App\Topic');
    }

    public function getAuthor() {
        return $this->belongsTo('App\User', 'author');
    }

    public function getAttachment() {
        return $this->morphTo('post_attachable');
    }

    public function getComments() {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
