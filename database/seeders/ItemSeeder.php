<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        for ($i = 0; $i < 100; $i++) {
            DB::table('items')->insert([
                'name' => $faker->word,
                'price' => random_int(10000, 100000),
                'created_at' => Carbon::today()->subDays(rand(0, 365)),
            ]);
        }
    }
}
