<?php

namespace Database\Seeders;

use App\Models\Departure;
use App\Models\Interfaces\StatusInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departure::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Departure name 1',
        ]);

        Departure::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Departure name 2',
        ]);

        Departure::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Departure name 3',
        ]);
    }
}
