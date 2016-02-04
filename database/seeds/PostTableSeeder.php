<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Provider\Lorem;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'content' => Lorem::paragraph(),
            'author' => 1,
            'topic_id' => 4,
            'post_attachable_id' => 1,
            'post_attachable_type' => 'App\Event'
        ]);

        Post::create([
            'content' => Lorem::paragraph(),
            'author' => 1,
            'topic_id' => 3,
            'post_attachable_id' => 2,
            'post_attachable_type' => 'App\Event'
        ]);

        Post::create([
            'content' => Lorem::paragraph(),
            'author' => 1,
            'topic_id' => 3,
            'post_attachable_id' => 3,
            'post_attachable_type' => 'App\Event'
        ]);

        Post::create([
            'content' => Lorem::paragraph(),
            'author' => 1,
            'topic_id' => 1,
            'post_attachable_id' => 1,
            'post_attachable_type' => 'App\Event'
        ]);

        Post::create([
            'content' => Lorem::paragraph(),
            'author' => 1,
            'topic_id' => 2,
            'post_attachable_id' => 2,
            'post_attachable_type' => 'App\Event'
        ]);
    }
}
