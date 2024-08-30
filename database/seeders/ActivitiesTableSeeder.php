<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Seed the activities table.
     *
     * @return void
     */
    public function run()
    {
        // Record 1
        Activity::create([
            'tank_id' => 1,
            'employee_id' => 2,
            'activity' => 'feeding',
            'feed_type' => 'AQU001',
            'unit_measurement' => 'kg',
            'quantity' => 1
        ]);

        // Record 2
        Activity::create([
            'tank_id' => 1,
            'employee_id' => 2,
            'activity' => 'change water',
            'feed_type' => '',
            'unit_measurement' => 'liters',
            'quantity' => 6672
        ]);
    }
}
