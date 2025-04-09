<?php

namespace Database\Factories;

use App\Models\Base;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Product>
 */
class ProductFactory extends Factory
{
  protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'pos' => random_int(1, 100),
          'image' => 'product/TG546JFKMNLK54.jpg',
          'category_id' => random_int(1, 100),
          'title' => $this->faker->name(),
          'color' => $this->faker->colorName(),
          'cash' => random_int(100, 2000000),
          'remains' => random_int(1, 100),
          'shipment' => random_int(1, 100),
          'qr' => $this->faker->postcode(),
        ];
    }
}
