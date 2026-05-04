<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'name' => fake()->name(),
        'age' => fake()->numberBetween(25, 60),
        'nation' => fake()->country(),
        'height' => fake()->numberBetween(150, 190) . " cm",
        'bio' => fake()->paragraph(),
        'hobby' => fake()->words(3, true),
        'imagepath' => 'candidates/default.jpg', // ပုံသေ အရင်ထားထားလို့ရပါတယ်
    ];
}
}
