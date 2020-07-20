<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $nuovo_movie = new Movie();
            $nuovo_movie->title = $faker->sentence(3);
            $nuovo_movie->overview = $faker->sentence(20);
            $nuovo_movie->rating = $faker->randomFloat(1, 4, 10);
            $nuovo_movie->save();
        }
    }
}
