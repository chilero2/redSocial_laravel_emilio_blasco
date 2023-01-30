<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
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
        $user_id = User::all('id')->random()->id;
        $image_id = Image::all('id')->random()->id;
        $date = Image::all('created_at')->where('id', '=', $image_id);
        $date_created = fake()->dateTimeBetween($date, 'now');
        return [
            'user_id' => $user_id,
            'image_id' => $image_id,
            'content'=>fake()->sentence(12),
            'created_at' => $date_created,
            'updated_at' => fake()->dateTimeBetween($date_created, 'now')
        ];
    }
}
