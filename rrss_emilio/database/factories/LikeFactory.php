<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    protected $model = Like::class;
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
            'create_at' => $date_created,
            'updated_ad' => fake()->dateTimeBetween($date_created, 'now')
        ];
    }
}
