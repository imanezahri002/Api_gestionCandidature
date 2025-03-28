<?php

namespace Database\Factories;

use App\Models\Candidat;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompetencUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidat_id' => Candidat::factory(),
            'competence_id' => Competence::factory(),
        ];
    }
}
