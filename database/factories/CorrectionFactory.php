<?php

namespace Database\Factories;

use App\Models\Correction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Correction>
 */
class CorrectionFactory extends Factory
{
  protected $model = Correction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pos' => random_int(1111, 9999),
            'type' => $this->faker->word(),
            'value' => random_int(1111, 9999),
        ];
    }
}
