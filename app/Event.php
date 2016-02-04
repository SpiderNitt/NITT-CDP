<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['scheduled_at', 'description'];

    public function getTopic() {
        return $this->belongsTo('App\Topic');
    }

    public function getCreator() {
        return $this->belongsTo('App\User', 'creator');
    }

    public function getPosts() {
        return $this->morphMany('App\Post', 'post_attachable');
    }
}
