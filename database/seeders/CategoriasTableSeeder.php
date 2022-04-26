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

      DB::table('categorias')->insert([
          'name' => 'Rehab'
      ]);

      DB::table('categorias')->insert([
          'name' => 'Juiced'
      ]);

      DB::table('categorias')->insert([
          'name' => 'Zero Sugar'
      ]);

      DB::table('categorias')->insert([
          'name' => 'Punch'
      ]);

    }
}
