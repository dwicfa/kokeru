<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagersController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('managers.dashboard');
    // }
    // public function profile()
    // {
    //     return view('managers.profile');
    // }
    public function index(string $page)
    {
        if (view()->exists("managers.{$page}")) {
            return view("managers.{$page}");
        }
        return abort(404);
    }
}
