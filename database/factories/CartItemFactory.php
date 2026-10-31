<?php

namespace Database\Factories;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CartItem>
 */
class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomNumber(),
            'itemable_id' => fake()->randomNumber(),
            'itemable_type' => fake()->name(),
            'quantity' => fake()->randomNumber(),
            'price_at_addition' => fake()->randomNumber(),

        ];
    }
}
