<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Album>
 */
class AlbumFactory extends Factory
{
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'band_id' => fake()->randomNumber(),
            'title' => fake()->name(),
            'label' => fake()->name(),
            'year' => fake()->dateTime(),
            'format' => fake()->randomElement(['vinyl', 'cd']),
            'path' => fake()->name(),
        ];
    }
}
