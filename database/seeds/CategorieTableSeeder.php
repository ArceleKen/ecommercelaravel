<?php

use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'label' => "categorie 1"
        ]);
        DB::table('categories')->insert([
            'label' => "categorie 2"
        ]);
        DB::table('categories')->insert([
            'label' => "categorie 3"
        ]);
        DB::table('categories')->insert([
            'label' => "categorie 4"
        ]);

    }
}
