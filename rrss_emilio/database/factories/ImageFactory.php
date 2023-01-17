<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    protected $model = Image::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $user_id      = User::all('id_user')->random()->id;
        $date = User::all('created_at')->where('id_user', '=', $user_id);
        $date_created = fake()->dateTimeBetween($date, 'now');
        return [
            'id_user' => $user_id,
            'image_path' => 'ejemplo.png',
            'description'=>fake()->sentence(12),
            'created_at' => $date_created,
            'updated_at' => fake()->dateTimeBetween($date_created, 'now')
        ];
    }
}