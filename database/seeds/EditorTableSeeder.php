<?php

use Illuminate\Database\Seeder;

class EditorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_editors')
        ->insert([
            [
                'user_id' => 1,
                'topic_id' => 1
            ],
            [
                'user_id' => 1,
                'topic_id' => 3
            ],
            [
                'user_id' => 2,
                'topic_id' => 4
            ],
            [
                'user_id' => 3,
                'topic_id' => 2
            ],
            [
                'user_id' => 3,
                'topic_id' => 3
            ],
        ]);
    }
}
