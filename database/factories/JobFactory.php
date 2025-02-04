<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'salary' => fake()->numberBetween(2000, 10000),
            'location' => fake()->city(),
            'category' => fake()->randomElement(\App\Models\Job::$categories),
            'type' => fake()->randomElement(\App\Models\Job::$types),
            'experience' => fake()->randomElement(\App\Models\Job::$experiences),
        ];
    }
}
