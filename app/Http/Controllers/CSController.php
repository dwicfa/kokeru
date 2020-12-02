<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CSController extends Controller
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

    public function index(string $page)
    {
        if (view()->exists("cs.{$page}")) {
            return view("cs.{$page}");
        }
        return abort(404);
    }
}
