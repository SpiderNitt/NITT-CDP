<?php

use Illuminate\Database\Seeder;
use App\Vote;

class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vote::create([
            'type' => 'VOTE_UP',
            'user_id' => 1,
            'voteable_id' => 2,
            'voteable_type' => 'App\Comment'
        ]);
        Vote::create([
            'type' => 'VOTE_DOWN',
            'user_id' => 2,
            'voteable_id' => 2,
            'voteable_type' => 'App\Comment'
        ]);
        Vote::create([
            'type' => 'VOTE_UP',
            'user_id' => 1,
            'voteable_id' => 3,
            'voteable_type' => 'App\Post'
        ]);
        Vote::create([
            'type' => 'VOTE_UP',
            'user_id' => 2,
            'voteable_id' => 4,
            'voteable_type' => 'App\Post'
        ]);
        Vote::create([
            'type' => 'VOTE_DOWN',
            'user_id' => 3,
            'voteable_id' => 4,
            'voteable_type' => 'App\Post'
        ]);
    }
}
