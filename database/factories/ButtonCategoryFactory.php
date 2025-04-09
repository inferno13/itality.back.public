<?php

namespace Database\Factories;

use App\Models\ButtonCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=ButtonCategory>
 */
class ButtonCategoryFactory extends Factory
{
    protected $model = ButtonCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'pos' => random_int(1111, 9999),
            'color' => '#ffab00',
            'image' => ''
        ];
    }
}
