<?php

namespace Database\Seeders;

use App\Models\Interfaces\StatusInterface;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Boat type name 1',
        ]);

        Type::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Boat type name 2',
        ]);

        Type::create([
            'status' => StatusInterface::STATUS_ACTIVE,
            'name' => 'Boat type name 3',
        ]);
    }
}
