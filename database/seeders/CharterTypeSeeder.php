<?php

namespace Database\Seeders;

use App\Models\CharterType;
use App\Models\Interfaces\StatusInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CharterType::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Group Trips',
        ]);

        CharterType::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Private Trips',
        ]);

        CharterType::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Family Trips',
        ]);
    }
}
