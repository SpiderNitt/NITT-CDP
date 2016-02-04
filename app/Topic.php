<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table = 'topics';

    protected $fillable = ['name', 'description'];

    public function getCollection() {
        return $this->belongsTo('App\Collection');
    }

    public function getPosts() {
        return $this->hasMany('App\Post');
    }

    public function getEvents() {
        return $this->hasMany('App\Event');
    }

    public function getSubscribers() {
        return $this->morphToMany('App\User', 'subscribable', 'subscriptions');
    }

    public function getModerators() {
        return $this->morphToMany('App\User', 'moddeable', 'role_moderators');
    }

    public function getEditors() {
        return $this->belongsToMany('App\User', 'role_editors');
    }
}
