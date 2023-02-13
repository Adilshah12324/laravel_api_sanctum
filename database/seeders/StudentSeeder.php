<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
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
            DB::table('students')->insert([
                'address_id' => $faker->numberBetween(1,5),
                'school_id' => $faker->numberBetween(1,5),
                'name' => $faker->unique()->name,
                'roll_no' => $faker->randomNumber(4),
                'fees' => $faker->unique()->randomNumber(4),
            ]);
        }
    }
}
