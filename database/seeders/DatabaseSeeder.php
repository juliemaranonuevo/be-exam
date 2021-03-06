<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();
        \App\Models\User::factory(10)->create();
        \App\Models\Product::truncate();
        \App\Models\Product::factory(10)->create();
    }
}
