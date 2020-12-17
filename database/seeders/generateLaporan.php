<?php

namespace Database\Seeders;
use App\Models\CS;
use App\Models\Ruangan;
use App\Models\Laporan;

use Illuminate\Database\Seeder;

class generateLaporan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama_ruang = array("Laboratorium Siscer", "R. Dosen", "R. E101", "R. E102", "R. E301",
                            'Gudang Lama','Gudang Baru','Toilet Lt 1',"R. E222", "R. E111", "R. E311",
                            'Toilet Lt 2','Aula','R. Tamu','R. TU','R. Kesehatan', "R. E422", "R. E441", "R. E411",
                            "R. E202", "R. E511", "R. E117"
                        );
        
        $count_cs = count(CS::all());
        $count_ruang = count(Ruangan::all());
        
        for ($i=0; $i <30 ; $i++) { 
            $j = 0;
            foreach($nama_ruang as $nama) {
                $cs  = CS::all()->get($j % $count_cs);
                $ruang  = Ruangan::all()->get($j % $count_ruang);
                $j = $j+1;
                $laporan = new Laporan();
                $laporan->id_cs = $cs->id;
                $laporan->id_ruang = $ruang->id;
                $laporan->status = 0;
                $laporan->tanggal = '2020-11-'.($i+1);
                $laporan->save();
            }
            
            
        }
    }
}
