<?php

namespace Database\Factories;

use App\Models\Painting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Painting>
 */
class PaintingFactory extends Factory
{
    protected $model = Painting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'sku' => fake()->randomNumber(),
            'size' => fake()->name(),
            'month' => fake()->name(),
            'year' => fake()->dateTime(),
            'image_path' => fake()->name(),
        ];
    }
}
