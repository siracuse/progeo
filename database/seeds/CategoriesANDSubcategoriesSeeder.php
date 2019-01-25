<?php

use Illuminate\Database\Seeder;

class CategoriesANDSubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catRestaurant = DB::table('categories')->insertGetId ([
            'name' => 'Restaurant'
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catRestaurant,
            'name' => 'Indien'
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catRestaurant,
            'name' => 'Italien'
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catRestaurant,
            'name' => 'Gastronomique'
        ]);

        $catBoulangerie =  DB::table('categories')->insertGetId([
            'name' => 'Boulangerie',
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catBoulangerie,
            'name' => 'Blé'
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catBoulangerie,
            'name' => 'Seigle'
        ]);

        $catChocolatier = DB::table('categories')->insertGetId ([
            'name' => 'Chocolatier',
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catChocolatier,
            'name' => 'Chocolat noir'
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catChocolatier,
            'name' => 'Chocolat au lait'
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catChocolatier,
            'name' => 'Chocolat blanc'
        ]);

        $catHotel = DB::table('categories')->insertGetId ([
            'name' => 'Hôtel',
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catHotel,
            'name' => 'Entrée de gamme'
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catHotel,
            'name' => 'Moyenne gamme'
        ]);
        DB::table('subcategories')->insert ([
            'categoryId' => $catHotel,
            'name' => 'Haute gamme'
        ]);
    }
}
