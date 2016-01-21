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
}
