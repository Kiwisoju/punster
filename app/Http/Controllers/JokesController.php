<?php

namespace Punster\Http\Controllers;

use Punster\User;
use Punster\Joke;
use Illuminate\Http\Request;

class JokesController extends Controller
{
    public function store()
    {
        $joke = new Joke();

        $joke->user()->associate(User::find(request()->get('user_id')));
        $joke->referrer()->associate(auth()->user());
        $joke->points = request()->get('points');

        $joke->save();

        return redirect()->route('home');
    }
}
