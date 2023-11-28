<?php

namespace Database\Seeders;

use App\Models\Provincias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provincias::create([
            'nombre'=>'Santa Cruz',
            'pais_id'=>1,
        ]);
        Provincias::create([
            'nombre'=>'Buenos Aires',
            'pais_id'=>2,
        ]);
    }
}
