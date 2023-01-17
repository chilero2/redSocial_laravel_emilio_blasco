<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $user_id = User::all('id_user')->random()->id;
        $image_id = User::all('id_image')->where('id_user', '=', $user_id)->random()->id;
        $date = User::all('created_at')->where('id_image', '=', $image_id);
        $date_created = fake()->dateTimeBetween($date, 'now');
        return [
            'id_user' => $user_id,
            'id_image' => 'ejemplo.png',
            'content'=>fake()->sentence(12),
            'create_at' => $date_created,
            'updated_ad' => fake()->dateTimeBetween($date_created, 'now')
        ];
    }
}
