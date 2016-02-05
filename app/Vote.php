<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $fillable = ['type'];

    public function getVoter() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getVoteable() {
        return $this->morphTo('voteable');
    }
}
