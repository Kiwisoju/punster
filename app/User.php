<?php

namespace Punster;

use Punster\Joke;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [ 'current_points' ];

    public function jokes()
    {
        return $this->hasMany(Joke::class);
    }

    public function referredJokes()
    {
        return $this->hasMany(Joke::class, 'referrer_id');
    }

    public function getCurrentPointsAttribute()
    {
        //TODO - Put some date range limitation on this later.
        return $this->jokes->sum('points');
    }
}
