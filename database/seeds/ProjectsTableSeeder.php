<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Project::truncate();
        \App\Project::unguard();

        $faker = \Faker\Factory::create();

        \App\User::all()->each(function ($user) use ($faker) {
            \App\Project::create([
                'user_id' => $user->id,
                'title'   => $faker->domainWord,
                'excerpt' => $faker->catchPhrase,
                'description' => $faker->paragraphs(1, true),
                'url' => $faker->url(3, true),
                'image' => $faker->imageUrl($width = 640, $height = 640, 'technics')
            ]);
        });
    }
}
