<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\ExperienceImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++){
            ExperienceImage::create([
                'experience_id' => $i+1,
                'url' => 'https://climate.onep.go.th/wp-content/uploads/2020/01/default-image.jpg',
            ]);
        }
    }
}
