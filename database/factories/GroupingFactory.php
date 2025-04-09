<?php

namespace Database\Factories;

use App\Models\Grouping;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Grouping>
 */
class GroupingFactory extends Factory
{
  protected $model = Grouping::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'pos' => random_int(1,20),
          'title' => $this->faker->title(),
        ];
    }
}
