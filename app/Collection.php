<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //
    protected $table= 'collections';

    protected $fillable = ['name', 'description'];

    public function getTopics() {
        return $this->hasMany('App\Topic');
    }

    public function getModerators() {
        return $this->morphToMany('App\User', 'moddeable', 'role_moderators');
    }
}
