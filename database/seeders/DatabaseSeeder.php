<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'role' => 'admin',
        //     'password' => 'secret123',
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'test@example.com',
        //     'role' => 'user',
        //     'password' => 'secret123',
        // ]);

        $this->call([
            ServiceSeeder::class,
            ManufacturerSeeder::class,
            EquipmentSeeder::class,
            ClientSeeder::class,
            EquipmentSeeder::class,
        ]);
    
    }
}
