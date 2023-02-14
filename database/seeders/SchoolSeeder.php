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
                'strength' => $faker->numberBetween(1000, 5000),
                'phone' => $faker->unique()->phoneNumber,
            ]);
        }
    }
}
