<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $date = fake()->dateTimeBetween('-2 year', 'now');
        return [
            'role' => fake()->randomElement(['administrador', 'cliente']),
            'name' => fake()->name(),
            'surname' => fake()->firstName(), // password
            'user_name' => fake()->userName(),
            'email' => fake()->email(),
            'password' => fake()->password(),
            'image' => 'example.png',
            'create_at' => $date,
            'updated_ad' => fake()->dateTimeBetween($date, 'now')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
