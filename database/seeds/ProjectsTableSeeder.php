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
            foreach (range(1, 5) as $i) {
                \App\Project::create([
                    'user_id' => $user->id,
                    'title'   => $faker->sentence,
                    'description' => $faker->paragraphs(3, true),
                    'url' => $faker->url(3, true),
                ]);
            }
        });
    }
}
