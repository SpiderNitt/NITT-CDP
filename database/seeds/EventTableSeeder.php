<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create();

        Event::create([
            'scheduled_at' => Carbon\Carbon::now()->addDays(4),
            'topic_id' => 1,
            'creator' => 2,
            'description' => $faker->paragraph
        ]);
        Event::create([
            'scheduled_at' => Carbon\Carbon::now()->addDays(5),
            'topic_id' => 2,
            'creator' => 2,
            'description' => $faker->paragraph
        ]);
        Event::create([
            'scheduled_at' => Carbon\Carbon::now()->addDays(6),
            'topic_id' => 4,
            'creator' => 3,
            'description' => $faker->paragraph
        ]);
    }
}
