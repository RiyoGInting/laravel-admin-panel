<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SellSummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $price_total = random_int(100000, 1000000);
            $discount_total = random_int(10000, 100000);
            $date = Carbon::today()->subDays(rand(0, 365));

            DB::table('sell_summaries')->insert([
                'date' => $date,
                'employee_id' => rand(1, 100),
                'created_date' => $date,
                'price_total' => $price_total,
                'discount_total' => $discount_total,
                'total' => $price_total - $discount_total,
                'created_at' => $date,
            ]);
        }
    }
}
