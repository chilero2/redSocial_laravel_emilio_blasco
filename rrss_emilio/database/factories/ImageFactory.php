<?php

    namespace Database\Factories;

    use App\Models\Image;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends Factory<Image>
     */
    class ImageFactory extends Factory {
        protected $model = Image::class;

        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array {
            $user_id      = User::all('id')->random()->id;
            $date         = User::all('created_at')->where('id', '=', $user_id);
            $date_created = fake()->dateTimeBetween($date, 'now');
            return [
                'user_id'     => $user_id,
                'image_path'  => fake()->imageUrl(640, 480, 'cats', true),
                'description' => fake()->sentence(12),
                'created_at'  => $date_created,
                'updated_at'  => fake()->dateTimeBetween($date_created, 'now'),
            ];
        }
    }
