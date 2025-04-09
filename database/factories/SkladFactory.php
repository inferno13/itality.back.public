<?php

namespace Database\Factories;

use App\Models\Sklad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Sklad>
 */
class SkladFactory extends Factory
{
  protected $model = Sklad::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'date_start_work' => date('d-m-Y H:i:s'),
          'date_end_work' => date('d-m-Y H:i:s'),
          'counterparty' => $this->faker->title(2),
          'cars' => $this->faker->name(),
          'sum' => random_int(100, 2000000),
          'payed' => random_int(100, 2000000),
          'status' => $this->faker->word,
          'comments' => $this->faker->text,
        ];
    }
}
