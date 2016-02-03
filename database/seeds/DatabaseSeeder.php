<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CollectionsTableSeeder::class);
        $this->call(TopicTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(SubscriberTableSeeder::class);

        Model::reguard();
    }
}
