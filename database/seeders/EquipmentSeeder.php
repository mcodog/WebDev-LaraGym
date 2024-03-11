<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = ["Treadmill", "Stationary bike", "Elliptical machine", "Rowing machine", "Stair climber", "Weight bench", "Squat rack", "Power cage", "Smith machine", "Leg press machine", "Leg extension machine", "Leg curl machine", "Calf raise machine", "Chest press machine", "Shoulder press machine", "Lat pulldown machine", "Cable crossover machine", "Dumbbells", "Barbells", "Kettlebells", "Resistance bands", "Medicine balls", "Stability balls", "Foam rollers", "TRX suspension trainer", "Battle ropes", "Jump rope", "Agility ladder", "Plyometric box", "Gymnastic rings", "Ankle weights", "Wrist weights", "Grip strengtheners", "Ab wheel", "Push-up bars", "Pull-up bar", "Dip station", "Glute-ham developer", "Cable machine", "Seated calf machine", "Preacher curl bench", "Hyperextension bench", "Roman chair", "Incline bench", "Decline bench", "Cable row machine", "Hack squat machine", "Leg abduction machine", "Leg adduction machine", "Rotary torso machine", "Standing calf machine", "Seated leg press machine", "Pec deck machine", "Fly machine", "Seated row machine", "Smith machine", "Assisted pull-up machine", "Assisted dip machine", "Leg raise machine", "Assisted chin-up machine", "Vibration platform"];

        $categories = ["Cardio Equipment", "Strength Training Equipment", "Functional Training", "Flexibility and Mobility Training", "Recovery Equipment", "Miscellaneous"];

        $minManufacturer = Manufacturer::min('id');
        $maxManufacturer = Manufacturer::max('id');


        $faker = Faker::create();
        foreach(range(1, 100) as $index) {
            DB::table('equipments')->insert([
                'description' => $faker->randomElement($equipments),
                'category' => $faker->randomElement($categories),
                'dimension' => $faker->randomNumber(),
                'manufacturer_id' => $faker->numberBetween($min = $minManufacturer, $max = $maxManufacturer),
                'weight' =>  $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
                'cost' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            ]);
        }
    }
}
