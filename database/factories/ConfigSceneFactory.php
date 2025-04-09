<?php

namespace Database\Factories;

use App\Models\Config;
use App\Models\ConfigScene;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Config>
 */
class ConfigSceneFactory extends Factory
{
  protected $model = ConfigScene::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'type' => $this->faker->word,
          'button' => 'button/SILF54ER09J34NSDF.jpg',
          'scene_left' => 'scene_left/SILF54ER09J34NSDF.jpg',
          'scene_right' => 'scene_right/SILF54ER09J34NSDF.jpg',
          'mask_left' => 'mask_left/SILF54ER09J34NSDF.jpg',
          'mask_right' => 'mask_right/SILF54ER09J34NSDF.jpg'
        ];
    }
}
