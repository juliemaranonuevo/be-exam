<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $faker = Factory::create();
        $product = new Product();
        $user->username = $faker->userName;
        $user->email = 'superadmin@sample.com';
        $user->email_verified_at = now();
        $user->password = 'secret';
        $user->role_id = 1;
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
