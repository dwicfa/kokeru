<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Laporan;
use Carbon\Carbon;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->reportDate = new Carbon();
        $this->now = new Carbon();
        $this->status = 'semua';
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
            case 'laporan':
                $laporan = Laporan::all();
                return view('managers/laporan', [
                    'reportDate' => new Carbon(),
                    'now' => new Carbon(),
                    'status' => 'semua',
                    'laporan' => Laporan::where([['tanggal',date('y-m-d')]])->orderBy('id')->get()
                ], compact('laporan'));
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
    public function getlaporan($id_laporan){
        $laporan = Laporan::find($id_laporan);
        return view('managers.bukti')->with('laporan',$laporan);
    }
    public function pilihTanggal(Request $request){
            if($request->status == "semua"){
                $laporan = Laporan::where([['tanggal',$request->tanggal]])->orderBy('id')->get();
            }else{
                $laporan = Laporan::where([['tanggal',$request->tanggal],['status', $request->status == "sudah"?1:0 ]])->orderBy('id')->get();
            }
            
            return view('managers/laporan', [
                'reportDate' => Carbon::parse($request->tanggal),
                'now' => new Carbon(),
                'status' => $request->status,
                'laporan' => $laporan
            ], compact('laporan'));
        }
}