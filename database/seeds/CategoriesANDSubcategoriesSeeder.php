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
            'category_id' => $catRestaurant,
            'name' => 'Indien'
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catRestaurant,
            'name' => 'Italien'
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catRestaurant,
            'name' => 'Gastronomique'
        ]);

        $catBoulangerie =  DB::table('categories')->insertGetId([
            'name' => 'Boulangerie',
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catBoulangerie,
            'name' => 'Blé'
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catBoulangerie,
            'name' => 'Seigle'
        ]);

        $catChocolatier = DB::table('categories')->insertGetId ([
            'name' => 'Chocolatier',
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catChocolatier,
            'name' => 'Chocolat noir'
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catChocolatier,
            'name' => 'Chocolat au lait'
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catChocolatier,
            'name' => 'Chocolat blanc'
        ]);

        $catHotel = DB::table('categories')->insertGetId ([
            'name' => 'Hôtel',
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catHotel,
            'name' => 'Entrée de gamme'
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catHotel,
            'name' => 'Moyenne gamme'
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catHotel,
            'name' => 'Haute gamme'
        ]);

        $catBar = DB::table('categories')->insertGetId ([
            'name' => 'Bar',
        ]);
        DB::table('subcategories')->insert ([
            'category_id' => $catBar,
            'name' => 'Bar à bière'
        ]);

    }
}
