<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => rand(0,5),
            'entity_id' => rand(1,10),
            'entity_type' => 'App\Services\BannerService',
            'image' => fake()->image(),
            'name' => fake()->word(),
            'price' => rand(1,1000),
        ];
    }
}
