<?php

namespace Database\Seeders;

use App\Models\Interfaces\StatusInterface;
use App\Models\TripType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TripType::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Cruise',
        ]);

        TripType::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Island Trip',
        ]);

        TripType::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Home Trip',
        ]);
    }
}
