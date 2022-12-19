<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        DB::table('offers')->insert([
            [
                'name' => 'Special Offer #1',
                'type' => 'Discount',
                'description' => '20% discount on any room for 2 or more people.'
            ],
            [
                'name' => 'Free breakfast for 2',
                'type' => 'Free item',
                'description' => 'Free breakfast for up to 2 people.'
            ],
            [
                'name' => 'Early reserve',
                'type' => 'Discount',
                'description' => '10% discount if reserved 3 days in advance.'
            ]
        ]);
    }
}
