<?php

namespace Punster;

use Punster\User;
use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }
}
