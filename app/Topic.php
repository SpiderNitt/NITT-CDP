<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table = 'topics';

    protected $fillable = ['name', 'description'];

    public function getCollection() {
        return $this->belongsTo('App\Collection', 'collection_id');
    }

    public function getPosts() {
        return $this->hasMany('App\Post', 'topic_id');
    }

    public function getEvents() {
        return $this->hasMany('App\Event', 'topic_id');
    }

    public function getSubscribers() {
        return $this->morphToMany('App\User', 'subscribable', 'subscriptions')->withTimestamps();
    }

    public function getModerators() {
        return $this->morphToMany('App\User', 'moddeable', 'role_moderators')->withTimestamps();
    }

    public function getEditors() {
        return $this->belongsToMany('App\User', 'role_editors')->withTimestamps();
    }
}
