<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the start and end dates for August 2024
        $startDate = Carbon::create(2024, 8, 1);
        $endDate = Carbon::create(2024, 8, 31);

        // Loop through each day of August 2024
        while ($startDate->lte($endDate)) {
            // Create entries for 7 AM
            DB::table('activities')->insert([
                'tank_id' => 1,
                'employee_id' => 1,
                'activity' => 'Feeding',
                'feed_type' => 'Feed Type A',
                'unit_measurement' => 'kg',
                'quantity' => 1.00,
                'start_date' => $startDate->format('Y-m-d 07:00:00'),
                'end_date' => $startDate->format('Y-m-d 07:00:00'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Create entries for 6 PM
            DB::table('activities')->insert([
                'tank_id' => 1,
                'employee_id' => 1,
                'activity' => 'Feeding',
                'feed_type' => 'Feed Type A',
                'unit_measurement' => 'kg',
                'quantity' => 1.00,
                'start_date' => $startDate->format('Y-m-d 18:00:00'),
                'end_date' => $startDate->format('Y-m-d 18:00:00'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Move to the next day
            $startDate->addDay();
        }
    }
}
