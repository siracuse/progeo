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
            'name' => 'Belaghrouz',
            'firstname' => 'Quentin',
            'phone'=>'0000000000',
            'email' => 'quentin.belaghrouz@example.fr',
            'password'=> '123456789',
            'is_resp'=>true
        ]);

        factory(App\User::class, 10)->create();
    }
}
