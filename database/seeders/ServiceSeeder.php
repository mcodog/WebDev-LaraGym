<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coaching_programs = ["Strength Training", "Cardiovascular Training", "Weightlifting", "High-Intensity Interval Training (HIIT)", "Circuit Training", "Functional Training", "Bodybuilding", "Powerlifting", "CrossFit", "Calisthenics", "Flexibility and Mobility Training", "Core Strengthening", "Plyometric Training", "Resistance Band Training", "Kettlebell Training", "Olympic Weightlifting", "TRX Suspension Training", "Bodyweight Training", "Endurance Training", "Basketball Training Program", "Volleyball Training Program", "Soccer Training Program", "Tennis Coaching Program", "Swimming Instruction Program", "Golf Coaching Program", "Martial Arts Training Program", "Track and Field Coaching Program", "Gymnastics Instruction Program", "Rugby Training Program", "Cricket Coaching Program", "Baseball Training Program", "Softball Coaching Program", "Wrestling Instruction Program", "Field Hockey Training Program", "Lacrosse Coaching Program", "Ice Hockey Training Program", "Skiing and Snowboarding Instruction Program", "Cycling Coaching Program", "Archery Training Program"];

        
        $faker = Faker::create();
        foreach(range(1, 50) as $index) {
            DB::table('service')->insert ([
                'title' => $faker->randomElement($coaching_programs),
                'duration' => $faker->randomElement(['6 Months', '1 Month', '3 Months']),
                'description' => "This is a sample description.",
            ]);
        }
    }
}
