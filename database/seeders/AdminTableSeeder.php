<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admin')->insert([
        'name' => 'Admin Admin',
        'email' => 'admin@material.com',
        'password' => Hash::make('secret'),
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
}
