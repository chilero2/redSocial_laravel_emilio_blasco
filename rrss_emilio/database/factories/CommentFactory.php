<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Image;
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
        $user_id = User::all('id_user')->random()->id_user;
        $image_id = Image::all('id_image')->random()->id_image;
        $date = Image::all('created_at')->where('id_image', '=', $image_id);
        $date_created = fake()->dateTimeBetween($date, 'now');
        return [
            'id_user' => $user_id,
            'id_image' => $image_id,
            'content'=>fake()->sentence(12),
            'created_at' => $date_created,
            'updated_at' => fake()->dateTimeBetween($date_created, 'now')
        ];
    }
}
