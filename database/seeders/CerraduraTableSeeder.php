<?php

namespace Database\Seeders;

use App\Models\Cerradura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CerraduraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cerradura::create([
            'cantidad_veces_abierto'=>186,
            'cantidad_veces_cerrado'=>97,
        ]);
    }
}
