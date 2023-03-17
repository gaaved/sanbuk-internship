<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ExperienceImage;
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
        $this->call([
            TypeSeeder::class,
            TripTypeSeeder::class,
            CharterTypeSeeder::class,
            DepartureSeeder::class,
            VendorSeeder::class,
            ExperienceSeeder::class,
            PackagesSeeder::class,
            ExperienceImagesSeeder::class,
        ]);
    }
}
