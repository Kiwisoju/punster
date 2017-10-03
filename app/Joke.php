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

    /**
     * Get the notes for the joke.
     *
     * @param  string  $value
     * @return string
     */
    public function getNotesAttribute($value)
    {
        if (! is_null($value)) {
            return $value;
        }

        if ($this->points < 0) {
            return 'There\'s no note for this joke, it must have been bad..';
        }

        return 'There\'s no note for this joke, you\'ll have to trust it was pretty good';
    }
}
