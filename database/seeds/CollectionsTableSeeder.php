<?php

use Illuminate\Database\Seeder;
use App\Collection;
use Faker\Provider\Lorem;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::create([
            'name' => 'Collection 1',
            'description' => Lorem::paragraph()
        ]);

        Collection::create([
            'name' => 'Collection 2',
            'description' => Lorem::paragraph()
        ]);
    }
}
