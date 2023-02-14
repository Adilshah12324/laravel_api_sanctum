<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,5) as $value){
            DB::table('subjects')->insert([
                'title' => $faker->unique()->sentence($nbWords = 1, $variableNbWords = true),
                'code'  => $faker->unique()->regexify('[A-Z]{2}\d{2}')
            ]);
        }
    }
}
