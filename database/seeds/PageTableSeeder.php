<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class PageTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
		// Create a Faker object
		$faker = Faker\Factory::create();

		// Create 5 sentences
		foreach (range(1, 5) as $item) {
			\Jai\Page\Page::create(array(// Title with 3 words
								  'name'      => $faker->sentence(3),
								  'slug'      => $faker->sentence(3),
								  // Content with 4 sentences
								  'content'    => $faker->paragraph(4),
								  // Date between now and two weeks earlier
								  //'created_at' => $faker->dateTimeBetween('now', '+14 days')
								  ));
		}
    }

}