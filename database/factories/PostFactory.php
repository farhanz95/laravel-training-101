<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker, $user_id) {
    return [
        //
        'user_id' => $user_id,
        'post_name' => $faker->sentence,
        'post_type' => $faker->randomElement(['White','Red','Yellow']),
        'post_address' => $faker->address,
        'post_time' => $faker->date(),
        'post_email' => $faker->unique()->safeEmail,
    ];
});
// factory(\App\Post::class,10)->create(['user_id'=>3]) 