<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use App\Exports\laporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Laporan;

class ReportController extends Controller
{
    private $reportDate;
    private $now;
    private $status;
    private $filename;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
    	$laporan = Laporan::all();
        return view('laporan', [
            'reportDate' => $this->reportDate,
            'now' => $this->now,
            'status' => $this->status,
            'laporan' => $laporan
        ], compact('laporan'));
    }

    public function excel()
	{
		return Excel::download(new laporanExport, 'laporan.xlsx');
	}

    public function createPDF() {
      // retreive all records from db
      $data = Laporan::all();

      // share data to view
      view()->share('Laporan',$data);
      $pdf = PDF::loadView('pdf_view', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }
/*
    public function laporan(Request $request){
    	if($request->status==''){
            $tgl = $request->reportDate;       
            $laporan = DB::select("SELECT l.idLaporan, l.idDist, r.idRuang AS idRuang, r.namaRuang, l.created_at, cs.namaCs 
                FROM ruang r LEFT JOIN distribusi d ON r.idRuang = d.idRuang
                LEFT JOIN (SELECT * FROM laporan l WHERE l.created_at = '$tgl') AS l ON l.idDist = d.idDist
                LEFT JOIN cs ON cs.idCs = d.idCs");
            return $laporan;
        } else{
            $tgl = $request->reportDate;
            $status = $request->status;
            $laporan = DB::select("SELECT l.idLaporan, l.idDist, r.idRuang AS idRuang, r.namaRuang, l.created_at, cs.namaCs 
                    FROM ruang r LEFT JOIN distribusi d ON r.idRuang = d.idDist
                    LEFT JOIN (SELECT * FROM laporan l WHERE l.created_at = '$tgl' ) AS l ON l.idDist = d.idDist
                    LEFT JOIN cs ON cs.idCs = d.idCs");
            
            return $laporan;
        }
    }*/
    // public function pilihTanggal(Request $request){
    //     $this->reportDate = $request->tanggal;
    //     $this->now = new Carbon();
    //     $this->status = $request->status;
    //     return back();
    // }
}
