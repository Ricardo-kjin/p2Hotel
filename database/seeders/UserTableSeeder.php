<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ricardo Ramirez',
            'email' => 'rikrdoramirez@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'cedula'=>'8754452',
            'address'=>'Av. Siempre Viva',
            'phone'=>'+591 78545225',
            'role'=>'admin',
        ]);
        User::create([
            'name' => 'Enrique Ramirez',
            'email' => 'enriqueramirez@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'cedula'=>'8751255',
            'address'=>'Av. Siempre Viva',
            'phone'=>'+591 78545256',
            'role'=>'admin',
        ]);
        // User::factory()->count(30)->create();
    }
}
