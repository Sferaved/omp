<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class AdminController extends Controller
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
     * @return Renderable
     */
    public function homeAdmin(): Renderable
    {
        return view('admin.homeAdmin');
    }

    /**
     * @return Renderable
     */
    public function homeUsers(): Renderable
    {
        return view('admin.homeUsers');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function laratrust()
    {
        return redirect("/laratrust");
    }
}
