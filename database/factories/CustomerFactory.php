<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email_address' => fake()->unique()->safeEmail(),
            'contact_number' => fake()->phoneNumber(),
            'created_at' => fake()->dateTime(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
