<?php

namespace Database\Seeders;
use App\Models\CS;
use App\Models\Ruangan;
use App\Models\Laporan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class distribusiRuang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $nama_ruang = array("Laboratorium Siscer", "R. Dosen", "R. E101", "R. E102", "R. E301",
                            'Gudang Lama','Gudang Baru','Toilet Lt 1',"R. E222", "R. E111", "R. E311",
                            'Toilet Lt 2','Aula','R. Tamu','R. TU','R. Kesehatan', "R. E422", "R. E441", "R. E411",
                            "R. E202", "R. E511", "R. E117"
                        );
        $i = 0;
        foreach($nama_ruang as $nama) {

            if($i % 2 ==0){
                $cs = new CS();
                $cs->name = $faker->name;
                $cs->email = $faker->unique()->email;
                $cs->password = Hash::make('12345678');
                $cs->save();
            }
            $i = $i+1;

            $ruang = new Ruangan();
            $ruang->name = $nama;
            $ruang->save();
            
            $laporan = new Laporan();
            $laporan->id_cs = $cs->id;
            $laporan->id_ruang = $ruang->id;
            $laporan->status = 0;
            $laporan->tanggal = date('Y-m-d');
            $laporan->save();
        }
    }
}
