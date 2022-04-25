<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('pedidos')->insert([
          'idUsuario' => 1,
          'fecha' => '2022/04/21',
          'estado' => 'pendiente',
      ]);
    }
}
