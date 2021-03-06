<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**  
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call([ managerTable::class]);
        $this->call([ distribusiRuang::class]);
        $this->call([ generateLaporan::class]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
