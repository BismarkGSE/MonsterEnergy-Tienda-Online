<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('productos')->insert([
          'nombreProducto' => 'Peach Energy Drink',
          'idCategoria' => 1,
          'stock' => 21,
          'precio' => 23.45,
          'img' => 'img/productos/rehab-peach-energy-drink.webp',
      ]);
    }
}
