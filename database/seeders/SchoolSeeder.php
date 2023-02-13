<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
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
            DB::table('schools')->insert([
                'name' => $faker->name(),
                'website' => $faker->city(),
                'strength' => $faker->randomDigit(),
                'phone' => $faker->unique()->phoneNumber,
                'address_id' => $faker->unique()->numberBetween(1,5),
            ]);
        }
    }
}
