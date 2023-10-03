<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Model>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $name = $this->faker->firstName();
        return [
            'account_name' => $name,
            'email' => $this->faker->safeEmail(),
            'password' => Hash::make($name),
            'account_address' => $this->faker->streetAddress(),
            'account_card_number' => $this->faker->creditCardNumber('Visa', true, '-'),
            'pin' => $this->faker->randomNumber(6, true),
            'phone_number' => $this->faker->e164PhoneNumber(),
            'balance' => rand(1_000_000, 500_000_000),
        ];
    }
}
