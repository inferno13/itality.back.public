<?php

namespace Database\Factories;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class RuleFactory extends Factory
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
        if($_SERVER['APP_ENV'] == 'local') {
            $dir = dirname(dirname(__DIR__)) . '\app\Http\Controllers';
        } else {
            $dir = dirname(dirname(__DIR__)) . '/app/Http/Controllers';
        }

        if($_SERVER['APP_ENV'] == 'local')
        {
            $slash = '\\';
        }
        else
        {
            $slash = '/';
        }

        $dir =  dirname(dirname(__DIR__)) . $slash . 'app' . $slash . 'Http' . $slash .'Controllers';

        //$dir =  dirname(dirname(__DIR__)) . $slash . 'App\Http\Controllers';

        $modules = array_diff(scandir($dir), array('.', '..'));
        $mods = [];
        foreach ($modules as $module) {
            if (strpos($module, '.php') == false) {
                $mods[] = $module;
            }
        }
        $ctrls = [];
        foreach ($mods as $mod) {

            if($_SERVER['APP_ENV'] == 'local') {
                $ctrls[] = dirname(dirname(__DIR__)) . '\app\Http\Controllers\\' . $mod;
            } else {
                $ctrls[] = dirname(dirname(__DIR__)) . '/app/Http/Controllers/' . $mod;
            }

            //$ctrls[] = dirname(dirname(__DIR__)) . $slash . 'app' . $slash . 'Http' . $slash .'Controllers' . $slash . $mod;

            foreach ($ctrls as $ctrl) {
                $controller = str_replace('.php', '',array_diff(scandir($ctrl), array('.', '..')));
            }
        }
        return [
            'group_id' => random_int(1, 3),
            'module' => $this->faker->randomElement($mods),
            'controller' => $this->faker->randomElement($controller),
            'active' => true,
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
