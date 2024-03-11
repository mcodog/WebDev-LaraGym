<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,100) as $index) {
            DB::table('manufacturers')->insert([
                'description' => $faker->name,
                'address' => $faker->address,
                'contact' => $faker->phoneNumber,
            ]);
        }
    }
}
