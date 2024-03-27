<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstNames = ["Walter", "Jesse", "Skyler", "Hank", "Marie", "Saul", "Gustavo", "Mike", "Tuco", "Jane", "Skinny", "Badger", "Todd", "Lydia", "Walter", "Gale", "Victor", "Hector", "Donald", "Ted", "Andrea", "Brock", "Huell", "Kuby", "Gretchen", "Elliot", "Holly", "Francesca", "Ken", "Bogdan", "Emilio", "No-Doze", "Combo", "Tortuga", "Tomas", "Luis", "Marco", "Leonel", "Gonzo", "Jack", "Todd's", "Mrs.", "SAC", "Declan", "Joey", "Dan", "Duane", "Joe", "Kenny", "Neil", "Pamela", "Peter", "Chris", "George", "Hank's", "Gaff", "Tomás", "Group", "David", "Chris", "Michael", "Charles", "Matt", "Jesse", "Laura", "Christopher", "Mark", "Raymond", "JB", "Lavell", "DJ", "Bill", "Steven", "Patrick", "Jessica", "Adam", "Christopher", "Daniel", "Luis", "David", "Emily", "Nigel", "Lynne", "Javier", "Carmen", "Jesus", "J.D.", "Jim", "Jonathan", "Aaron", "Bryan", "Bob", "Dean", "Anna"];
        
        $lastNames = ["White", "Pinkman", "White", "Schrader", "Schrader", "Goodman", "Fring", "Ehrmantraut", "Salamanca", "Margolis", "Pete", "Mayhew", "Alquist", "Rodarte-Quayle", "White", "Boetticher", "Salamanca", "Salamanca", "Margolis", "Beneke", "Cantillo", "Cantillo", "Babineaux", "Schwartz", "Schwartz", "White", "Liddy", "Wolynetz", "Koyama", "Jones", "Wachsberger", "Chow", "Joe", "Kandy", "Pamela", "Schuler", "Mara", "Merkert", "ASAC", "Gaff", "Cantillo", "Leader", "Costabile", "Cousins", "Wiles", "Baker", "Jones", "Plemons", "Fraser", "Cousins", "Margolis", "Cruz", "Blanc", "Crawford", "Qualls", "Burr", "Quezada", "Sane", "Hecht", "Godley", "King", "Moncada", "Moncada", "Ury", "Rios", "Gibbs", "Stewart", "Grajeda", "Serano", "Payan", "Garfield", "Beaver", "Banks", "Paul", "Cranston", "Odenkirk", "Norris", "Gunn"];

        
        $faker = Faker::create();
        foreach(range(1, 20) as $index) {
            DB::table('employee')->insert ([
                'first_name' => $faker->randomElement($firstNames),
                'last_name' => $faker->randomElement($lastNames),
                'age' => $faker->numberBetween(11, 99),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'job_type' => $faker->randomElement(['Coach', 'Cleaner', 'Clerk', 'Trainer', 'Part-Timer']),
                'status' =>$faker->numberBetween(0, 1000),
            ]);
        }
    }
}
