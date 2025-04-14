<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;
use Faker\Factory as Faker;
class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = ['Work','Friends','Others'];
        for ($i=0;$i<50;$i++){
            Person::create([
                'name'=> $faker->name,
                'email'=> $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'category' => $faker->randomElement($categories)
            ]);
        }
    }
}
