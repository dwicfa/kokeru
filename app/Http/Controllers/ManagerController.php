<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Laporan;

class ManagerController extends Controller
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
        switch ($page) {
            case 'dashboard':
                $laporan = Laporan::where('tanggal',date('y-m-d'))
                                    ->orderBy('id')
                                    ->Paginate(12);
                return view("managers.{$page}")->with('laporan',$laporan);
                break;
            case 'dataCS':
                return view("managers.{$page}");
                break;
                case 'dataCS':
                    return view("managers.{$page}");
                    break;
            case 'laporan':
                return view("managers.{$page}");
                break;
            case 'profile':
                return view("managers.{$page}");
                break;
            default:
                return abort(404);
                break;
        }
       
    }
}