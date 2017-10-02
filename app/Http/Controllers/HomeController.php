<?php

namespace Punster\Http\Controllers;

use Punster\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        $results = User::get()->sortByDesc('current_points')->values();

        return view('home', compact('users', 'results'));
    }
}
