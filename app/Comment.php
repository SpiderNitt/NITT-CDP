<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['content'];

    public function getAuthor() {
        return $this->belongsTo('App\User', 'author');
    }

    public function getCommentable() {
        return $this->morphTo('commentable');
    }

    public function getVotes() {
        return $this->morphMany('App\Vote', 'voteable');
    }
}
