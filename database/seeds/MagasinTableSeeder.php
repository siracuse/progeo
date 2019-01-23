<?php

use Illuminate\Database\Seeder;

class MagasinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('magasins')->insert([
            'nomMag' => str_random(10),
            'adrMag' => 'chemin des '.str_random(10),
            'telMag' => '1010101010',
            'mailMag' => str_random(10).'gmail.com',
            'siret' => str_random(10),
            'photo1' => str_random(10),
            'photo2' => str_random(10),
            'latitude' => (15.1),
            'longitude' => (10.1),
            'insee' => '1010',
            'cp' => '10100',

        ]);
    }
}
