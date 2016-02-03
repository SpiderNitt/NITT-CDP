<?php

use Illuminate\Database\Seeder;

class SubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')
        ->insert([
            'user_id' => 1,
            'subscribable_id' => 2,
            'subscribable_type' => 'App\User'
        ]);

        DB::table('subscriptions')
        ->insert([
            'user_id' => 2,
            'subscribable_id' => 3,
            'subscribable_type' => 'App\Topic'
        ]);

        DB::table('subscriptions')
        ->insert([
            'user_id' => 1,
            'subscribable_id' => 3,
            'subscribable_type' => 'App\Topic'
        ]);

        DB::table('subscriptions')
        ->insert([
            'user_id' => 3,
            'subscribable_id' => 2,
            'subscribable_type' => 'App\User'
        ]);

    }
}
