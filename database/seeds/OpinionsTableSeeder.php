<?php

use Illuminate\Database\Seeder;

class OpinionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opinions')->insert ([
            'rating' => 1,
            'comment' => 'Nul'
        ]);
        DB::table('opinions')->insert ([
            'rating' => 5,
            'comment' => 'Très Bien'
        ]);
        DB::table('opinions')->insert ([
            'rating' => 2,
            'comment' => 'Moyen'
        ]);
        DB::table('opinions')->insert ([
            'rating' => 3,
            'comment' => 'Bien'
        ]);
        DB::table('opinions')->insert ([
            'rating' => 4,
            'comment' => 'Accueillant'
        ]);
    }
}
