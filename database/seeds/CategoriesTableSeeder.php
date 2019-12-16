<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Gastronomia',],
            ['name' => 'Mechanika',],
            ['name' => 'Budowa',],
            ['name' => 'Sprzątanie',],
            ['name' => 'Edukacja',],
            ['name' => 'Uroda',],
        ]);
    }
}
