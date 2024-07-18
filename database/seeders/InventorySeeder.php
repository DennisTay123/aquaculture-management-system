<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    public function run()
    {
        DB::table('inventories')->insert([
            [
                'item_code' => 'AQU001',
                'name' => 'Fish Feed',
                'description' => 'High-quality fish feed for optimal growth',
                'category' => 'Feed',
                'um' => 'kg',
                'quantity' => 500,
                'price' => 20.00,
                'total_price' => 10000.00,
                'brand' => 'AquaFeed',
                'vendor_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code' => 'AQU002',
                'name' => 'Water Pump',
                'description' => 'High-efficiency water pump for circulation',
                'category' => 'Equipment',
                'um' => 'unit',
                'quantity' => 10,
                'price' => 150.00,
                'total_price' => 1500.00,
                'brand' => 'PumpMaster',
                'vendor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code' => 'AQU003',
                'name' => 'Oxygen Supply System',
                'description' => 'Automated oxygen supply system for fish tanks',
                'category' => 'Equipment',
                'um' => 'unit',
                'quantity' => 5,
                'price' => 500.00,
                'total_price' => 2500.00,
                'brand' => 'OxyFlow',
                'vendor_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
