<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Comment::create([
            'content' => $faker->paragraph,
            'author' => 1,
            'commentable_id' => 2,
            'commentable_type' => 'App\Post'
        ]);
        Comment::create([
            'content' => $faker->paragraph,
            'author' => 2,
            'commentable_id' => 4,
            'commentable_type' => 'App\Post'
        ]);
        Comment::create([
            'content' => $faker->paragraph,
            'author' => 3,
            'commentable_id' => 5,
            'commentable_type' => 'App\Post'
        ]);
        Comment::create([
            'content' => $faker->paragraph,
            'author' => 1,
            'commentable_id' => 2,
            'commentable_type' => 'App\Post'
        ]);
        Comment::create([
            'content' => $faker->paragraph,
            'author' => 3,
            'commentable_id' => 3,
            'commentable_type' => 'App\Post'
        ]);

    }
}
