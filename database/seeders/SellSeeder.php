<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $date = Carbon::today()->subDays(rand(0, 365));
            DB::table('sells')->insert([
                'created_date' => $date,
                'item_id' => rand(1, 100),
                'discount' => mt_rand(10, 25),
                'employee_id' => rand(1, 100),
                'created_at' => $date,
            ]);
        }
    }
}
