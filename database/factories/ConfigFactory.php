<?php

namespace Database\Factories;

use App\Models\Config;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Config>
 */
class ConfigFactory extends Factory
{
  protected $model = Config::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'active' => $this->faker->boolean,
          'pos' => random_int(900, 1000),
          'title' => $this->faker->name(),
          'col' => random_int(1, 100),
          'view' => $this->faker->text,
          'type' => $this->faker->word,
        ];
    }
}
