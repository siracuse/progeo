<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('subcategories')->insert([
            'categoryId' => $this->getRandomUserId(),
            'name' => 'chocolatier'
        ]);

    }
    private function getRandomUserId() {
        $cat = \App\Categorie::inRandomOrder()->first();
        return $cat->id;
    }
}
