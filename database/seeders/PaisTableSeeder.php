<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{
    /**'
     * Run the database seeds.
     */
    public function run(): void
    {
        Pais::create([
            'nombre'=>'Bolivia',
        ]);
        Pais::create([
            'nombre'=>'Argentina',
        ]);
    }
}
