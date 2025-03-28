<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Competence::factory(10)->create();
        // \App\Models\Candidat::factory(10)->create();

        // $competences = \App\Models\Competence::all();
        // $candidats = \App\Models\Candidat::all();

        // foreach ($candidats as $candidat) {
        //     $competencesToAttach = $competences->random(rand(1, 3))->pluck('id')->toArray();
        //     foreach ($competencesToAttach as $competenceId) {
        //     \Illuminate\Support\Facades\DB::table('user_competences')->insert([
        //         'competence_id' => $competenceId,
        //         'candidat_id' => $candidat->id,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        //     }


        }


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

