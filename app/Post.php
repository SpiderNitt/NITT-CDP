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
}
