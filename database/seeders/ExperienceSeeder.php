<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Interfaces\StatusInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [1, 2, 3];

        for ($i = 0; $i < 20; $i++){
            Experience::create([
                'status' => StatusInterface::STATUS_ACTIVE,
                'vendor_id' => $types[(mt_rand(0, 2))],
                'type_id' => $types[(mt_rand(0, 2))],
                'trip_type_id' => $types[(mt_rand(0, 2))],
                'charter_type_id' => $types[(mt_rand(0, 2))],
                'departure_id' => $types[(mt_rand(0, 2))],
                'name' => fake()->name,
                'description' => fake()->text,
            ]);
        }
    }
}
