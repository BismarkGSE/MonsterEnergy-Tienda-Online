<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // FIRST CATEGORI
      DB::table('categorias')->insert([
          'name' => 'Rehab'
      ]);

      // SECOND CATEGORI
      DB::table('categorias')->insert([
          'name' => 'Juice'
      ]);

    }
}
