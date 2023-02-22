<?php

namespace Database\Seeders;

use App\Models\Interfaces\StatusInterface;
use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'experience_id' => mt_rand(1, 20),
            'name' => fake()->word,
            'description' => fake()->text,
            'start_of_activity' => fake()->dateTimeBetween($startDate = '-3 days', $endDate = 'now'),
            'and_of_activity' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+3 days'),
        ]);

        Package::create([
            'status' => StatusInterface::STATUS_INACTIVE,
            'experience_id' => mt_rand(1, 20),
            'name' => fake()->word,
            'description' => fake()->text,
            'start_of_activity' => fake()->dateTimeBetween($startDate = '-7 days', $endDate = '-3 days'),
            'and_of_activity' => fake()->dateTimeBetween($startDate = '-2 days', $endDate = '-1 days'),
        ]);
    }
}
