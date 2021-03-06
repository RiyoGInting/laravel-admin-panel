<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
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
            DB::table('employees')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company_id' => rand(1, 100),
                'email' => $faker->freeEmail,
                'password' => Hash::make('password'),
                'phone' => $faker->phoneNumber,
                'created_by_id' => '1',
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
