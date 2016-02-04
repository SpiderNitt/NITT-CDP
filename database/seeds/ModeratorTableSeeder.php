<?php

use Illuminate\Database\Seeder;

class ModeratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_moderators')
        ->insert([
            [
                'user_id' => 1,
                'moddeable_id' => 1,
                'moddeable_type' => 'App\Collection'
            ],
            [
                'user_id' => 2,
                'moddeable_id' => 3,
                'moddeable_type' => 'App\Topic'
            ],
            [
                'user_id' => 2,
                'moddeable_id' => 1,
                'moddeable_type' => 'App\Topic'
            ],
            [
                'user_id' => 2,
                'moddeable_id' => 2,
                'moddeable_type' => 'App\Collection'
            ]
        ]);
    }
}
