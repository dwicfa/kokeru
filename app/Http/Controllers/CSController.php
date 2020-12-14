<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\Laporan;
use Auth;

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
        switch ($page) {
            case 'dashboard':
                $laporan = Laporan::where([['tanggal',date('y-m-d')],['id_CS',Auth::id()]])
                                    ->orderBy('id')
                                    ->Paginate(12);
                // return $laporan;
                return view("CS.{$page}")->with('laporan',$laporan);
                break;
            case 'profile':
                return view("CS.{$page}");
                break;
            default:
                return abort(404);
                break;
        }
       
    }
    
}
