<?php

namespace Punster\Http\Controllers;

use Punster\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $jokes = $user->jokes->sortByDesc('created_at');

        return view('user', compact('user', 'jokes'));
    }
}
