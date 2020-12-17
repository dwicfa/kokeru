<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(String $tanggal,string $status) 
    {
        $this->tanggal = $tanggal;
        $this->status = $status;
    }
    public function view(): View
    {
        if($this->status == "semua"){
            $laporan =  Laporan::where([['tanggal',$this->tanggal]])->get();
        }else{
            $laporan = Laporan::where([['tanggal',$this->tanggal],['status',$this->status == "sudah"?1:0]])->get();
        }
        return view('managers.exportView',[
            'laporan'=>$laporan,
            'tanggal'=>$this->tanggal
        ]);
        
    }
}
