<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CompanySeeder extends Seeder
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
            DB::table('companies')->insert([
                'name' => $faker->company,
                'email' => $faker->companyEmail,
                'website' => $faker->domainName,
                'created_by_id' => '1',
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
