<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Managers;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
class managerTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $manager = new Managers();
        $manager->name = $faker->name;
        $manager->email = $faker->unique()->email;
        $manager->password = Hash::make('12345678');
        $manager->save();
    }
}
