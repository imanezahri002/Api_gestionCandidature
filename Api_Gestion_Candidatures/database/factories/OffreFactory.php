<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offre>
 */
class OffreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraphs(3, true),
            'company_name' => $this->faker->company(),
            'location' => $this->faker->city(),
            'salary' => $this->faker->randomFloat(2, 20000, 150000),
            'employment_type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Freelance', 'Internship']),
            'experience_level' => $this->faker->randomElement(['Entry-level', 'Mid-level', 'Senior', 'Manager', 'Executive']),
            'deadline' => $this->faker->dateTimeBetween('+1 week', '+3 months')->format('Y-m-d'),
            'is_active' => $this->faker->boolean(80),
            'image' => $this->faker->imageUrl(),
            'recruteur_id' => \App\Models\Recruteur::inRandomOrder()->first()->id,
        ];
    }
}
