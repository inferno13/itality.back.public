<?php

namespace Database\Factories;

use App\Models\Config;
use App\Models\ConfigProject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Config>
 */
class ConfigProjectFactory extends Factory
{
  protected $model = ConfigProject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'coord_x' => random_int(1111, 9999),
          'coord_y' => random_int(1111, 9999),
          'turn' => random_int(1111, 9999),
          'scheme' => 'config/project/FSDKLJH545498ER34.jpg',
          'walkin' => 'config/project/FSDKLJH545498ER34.jpg',
          'select_1' => $this->faker->word,
          'value_1' => random_int(1, 100),
          'select_2' => $this->faker->word,
          'select_3' =>$this->faker->word,
          'value_2' => random_int(1, 100),
          'select_4' => $this->faker->word,
          'select_5' => $this->faker->word,
          'select_6' => $this->faker->word,
          'select_7' => $this->faker->word,
          'select_8' => $this->faker->word,
          'select_9' => $this->faker->word,
          'select_10' =>$this->faker->word ,
          'select_11' => $this->faker->word,
          'value_3' => random_int(1, 100),
          'select_12' => $this->faker->word,
          'select_13' => $this->faker->word,
          'select_14' => $this->faker->word,
        ];
    }
}
