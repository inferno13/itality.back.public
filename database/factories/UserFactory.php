<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return
            [
                'avatar' => 'avatar/ADOPW39403ds.jpg',
                'name' => fake()->name(),
                'surname' => fake()->name(),
                'pathname' => fake()->name(),
                'gender' => $this->faker->randomElement(['male','female']),
                'birthdate' => $this->faker->date('Y-m-d'),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => static::$password ??= Hash::make('12345678'),
                'remember_token' => Str::random(10),
                'phone' => fake()->phoneNumber(),
                'mobile' => fake()->phoneNumber(),
                'pasport1' => 'pasport1/JSDFSL545634SDSSD.jpg',
                'pasport2' => 'pasport1/JSDFSsdf634SDSSD.jpg',
                'group_id' => rand(1,3),
            ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
