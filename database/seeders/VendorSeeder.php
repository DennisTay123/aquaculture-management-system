<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    public function run()
    {
        DB::table('vendors')->insert([
            [
                'name' => 'Vendor 1',
                'contact_person' => 'John Doe',
                'contact_number' => '1234567890',
                'address' => '123 Main St, City, Country',
                'payment_terms' => 'Net 30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vendor 2',
                'contact_person' => 'Jane Smith',
                'contact_number' => '0987654321',
                'address' => '456 Another St, City, Country',
                'payment_terms' => 'Net 45',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
