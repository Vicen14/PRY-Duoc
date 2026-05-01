<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Vicente Elgueta',
            'rut' => '21.252.999-0',
            'email' => 'vicente@gmail.com',
            'password' => bcrypt('Vicente'),
        ]);
    }
}
