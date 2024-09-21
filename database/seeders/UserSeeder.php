<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) { // Seed 10 users
            DB::table('user_table')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email_address' => $faker->unique()->safeEmail,
                'mobile_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'status' => 1, // Default active status
                'created_at' => Carbon::now()
            ]);
        }
    }
}
