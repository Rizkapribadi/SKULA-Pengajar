<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\Materi::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'published' => false,
        'order' => $faker->randomNumber($nbDigits=2),
        'pelajaran_id'=> function(){

        	return factory(App\Pelajaran::class)->create()->_id;
        }
    ];
});