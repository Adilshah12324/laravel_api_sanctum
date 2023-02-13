<?php

namespace Database\Seeders;

use App\Models\Address;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
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
            DB::table('addresses')->insert([
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'country' => $faker->country,
            ]);
        }
    }
}
