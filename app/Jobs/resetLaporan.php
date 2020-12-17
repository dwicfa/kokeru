<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ruangan;
use App\Models\Laporan;
class resetLaporan implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ruangan = Ruangan::all();
        
        foreach ($ruangan as $r) {
            $prev_laporan = Laporan::where('id_ruang',$r->id)->orderby('tanggal','DESC')->first();
            $laporan = new Laporan();
            $laporan->id_ruang = $r->id;
            $laporan->id_cs = $prev_laporan->id_cs;
            $laporan->tanggal = date('Y-m-d');
            $laporan->status = 0;
            $laporan->save();
        }
    }
}
