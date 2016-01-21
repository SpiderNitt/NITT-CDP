<?php

use Illuminate\Database\Seeder;
use App\Topic;
use Faker\Provider\Lorem;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'name' => 'Topic 1',
            'description'=> Lorem::paragraph(),
            'collection_id' => 1
        ]);

        Topic::create([
            'name' => 'Topic 2',
            'description'=> Lorem::paragraph(),
            'collection_id' => 1
        ]);

        Topic::create([
            'name' => 'Topic 3',
            'description'=> Lorem::paragraph(),
            'collection_id' => 2
        ]);

        Topic::create([
            'name' => 'Topic 4',
            'description'=> Lorem::paragraph(),
            'collection_id' => 2
        ]);
    }
}
