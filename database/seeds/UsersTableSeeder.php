<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert ([
            'name' => 'hari',
            'firstname' => 'hari',
            'phone'=>'0000000000',
            'email' => 'hari@gmail.com',
            'password'=> bcrypt('azerty'),
            'is_resp'=>false
        ]);

        DB::table('users')->insert ([
            'name' => 'quentin',
            'firstname' => 'quentin',
            'phone'=>'0000000000',
            'email' => 'quentin@gmail.com',
            'password'=> bcrypt('azerty'),
            'is_resp'=>false
        ]);

        DB::table('users')->insert ([
            'name' => 'dorian',
            'firstname' => 'dorian',
            'phone'=>'0000000000',
            'email' => 'dorian@gmail.com',
            'password'=> bcrypt('azerty'),
            'is_resp'=>false
        ]);

        DB::table('users')->insert ([
            'name' => 'samuel',
            'firstname' => 'samuel',
            'phone'=>'0000000000',
            'email' => 'samuel@gmail.com',
            'password'=> bcrypt('azerty'),
            'is_resp'=>false
        ]);

        DB::table('users')->insert ([
            'name' => 'apu',
            'firstname' => 'apu',
            'phone'=>'0000000000',
            'email' => 'apu@gmail.com',
            'password'=> bcrypt('azerty'),
            'is_resp'=>true
        ]);

        factory(App\User::class, 10)->create();
    }
}
