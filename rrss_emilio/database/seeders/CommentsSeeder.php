<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        Comment::factory()->count(1)->create();
    }
}
