<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

      DB::table('productos')->insert([
          'nombreProducto' => 'Ultra Black Energy Drink',
          'idCategoria' => 3,
          'stock' => 85,
          'precio' => 2.45,
          'img' => 'img/productos/1650881389_monster_zero.jpg',
      ]);

      DB::table('productos')->insert([
          'nombreProducto' => 'Ultra Fiesta Energy Drink',
          'idCategoria' => 3,
          'stock' => 125,
          'precio' => 1.45,
          'img' => 'img/productos/1650881364_monster_ultra_fiesta.jpg',
      ]);

      DB::table('productos')->insert([
          'nombreProducto' => 'Ultra Red Energy Drink',
          'idCategoria' => 3,
          'stock' => 125,
          'precio' => 1.45,
          'img' => 'img/productos/1650881340_monster_zero_ultra_red.jpg',
      ]);

      DB::table('productos')->insert([
          'nombreProducto' => 'Monarch Energy Drink',
          'idCategoria' => 2,
          'stock' => 15,
          'precio' => 1.98,
          'img' => 'img/productos/1650879837_monster_juiced.jpg',
      ]);

      DB::table('productos')->insert([
          'nombreProducto' => 'Pipeline Energy Drink',
          'idCategoria' => 4,
          'stock' => 235,
          'precio' => 2.98,
          'img' => 'img/productos/1650879837_monster_juiced.jpg',
      ]);

    }
}
