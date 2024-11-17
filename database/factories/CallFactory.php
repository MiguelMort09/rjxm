<?php

namespace Database\Factories;

use App\Enums\StatusCall;
use App\Enums\TypeCall;
use App\Models\Call;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends Factory<Call>
 */
class CallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws RandomException
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->realText,
            'type' => TypeCall::from(random_int(1, 3)),
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date' => $this->faker->date('Y-m-d'),
            'requirements' => $this->faker->realText,
            'status' => StatusCall::from(random_int(1, 3)),
            'application_url' => $this->faker->url,
            'contact_person' => 'Ana López',
        ];
    }
}
