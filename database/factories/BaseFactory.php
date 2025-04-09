<?php

namespace Database\Factories;

use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Base>
 */
class BaseFactory extends Factory
{
  protected $model = Base::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'active' => $this->faker->boolean(),
          'pos' => random_int(900,1000),
          'button_category_id' => random_int(1,20),
          'grouping_id' => random_int(1,20),
          'name' => $this->faker->name(),
          'image' => 'base/SDLKFW4JO43POJ43.jpg',
          'property' => $this->faker->word(),
          'structure' => $this->faker->word(),
        ];
    }
}
