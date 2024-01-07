<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imageAccueil'=> $this->faker->url(),
            'imageAvatar'=> $this->faker->url(),
            'cvFrench'=> $this->faker->url(),
            'cvEnglish'=> $this->faker->url(),
            'jobRechercher'=> $this->faker->name(),
            'jobRechercher2'=> $this->faker->name(),
            'nomPrenom'=> $this->faker->name(),
        ];
    }
}
