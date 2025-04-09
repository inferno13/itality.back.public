<?php

namespace Database\Factories;

use App\Models\Config;
use App\Models\ConfigAssembling;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Config>
 */
class ConfigAssemblingFactory extends Factory
{
  protected $model = ConfigAssembling::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'type' => $this->faker->word,
          'pos' => random_int(900, 1000),
          'group' => $this->faker->title(),
          'title' => $this->faker->name(),
          'cash' => random_int(1, 100),
          'image' => 'config/assembling/JKF56PO355645KLJDFLG.jpg',
          'ishower_on' => $this->faker->boolean,
          'ishower_default' => $this->faker->boolean,
          'dushmaster_on' => $this->faker->boolean,
          'dushmaster_default' => $this->faker->boolean,
          'itality_on' => $this->faker->boolean,
          'itality_default' => $this->faker->boolean,
        ];
    }
}
