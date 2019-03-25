<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Store::class, 50)->create();

        DB::table('stores')->insert ([
            'name' => 'Roza Kebab',
            'address' => '1 Boulevard de la Libération',
            'phone' => '0974563773',
            'email' => 'roza@kebab.com',
            'siret' => '1111',
            'photoInside' => 'RozaKebabInside377.jpg',
            'photoOutside' => 'RozaKebabOutside708.jpg',
            'latitude' => '44.561461',
            'longitude' => '6.079691',
            'city_id' => '1819',
            'category_id' => '1',
            'subcategory_id' => '3',
            'user_id' => '5'
        ]);

        DB::table('stores')->insert ([
            'name' => 'Hotel Premiere classe',
            'address' => 'Avenue de provence',
            'phone' => '0505050505',
            'email' => 'pc@pc.com',
            'siret' => '22222',
            'photoInside' => 'aaa',
            'photoOutside' => 'aaa',
            'latitude' => '44.536935',
            'longitude' => '6.053542',
            'city_id' => '1819',
            'category_id' => '4',
            'subcategory_id' => '9',
            'user_id' => '1'
        ]);

        DB::table('stores')->insert ([
            'name' => 'Hotel F1',
            'address' => 'Rue de Tokoro',
            'phone' => '0606060606',
            'email' => 'f1@vroom.com',
            'siret' => '33333',
            'photoInside' => 'aaa',
            'photoOutside' => 'aaa',
            'latitude' => '44.566835',
            'longitude' => '6.101217',
            'city_id' => '1819',
            'category_id' => '4',
            'subcategory_id' => '10',
            'user_id' => '1'
        ]);

    }
}
