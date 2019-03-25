<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('promotions')->insert ([
            'startDate' => '2019-03-15 22:21:58',
            'endDate' => '2019-03-29 22:21:58',
            'name' => 'Promotion: -30 % à l\'achat de deux articles',
            'activated' => 1,
            'promotionCode' => rand(100,999),
            'opinionCode' => 999,
            'photo1' => str_random(10),
            'photo2' => str_random(10),
            'store_id' => 51,
        ]);

        factory(App\Promotion::class, 10)->create();
    }
}
