<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,5) as $value) {
            DB::table('teachers')->insert([
                'address_id' => $faker->numberBetween(1,5),
                'name' => $faker->unique()->name(),
                'phone' => $faker->unique()->phoneNumber(),
                'email' => $faker->unique()->email(),
                'age' => $faker->unique()->randomNumber(2),
                'qualification' => $faker->unique()->jobTitle(),
                'specialization' => $faker->unique()->jobTitle(),
                'experience' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
