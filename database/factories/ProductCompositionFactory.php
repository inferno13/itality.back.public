<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductComposition>
 */
class ProductCompositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'button_id' => random_int(1, 20),
            'product_id' => random_int(1, 20),
            'count' => random_int(1, 200),
        ];

    }
}
