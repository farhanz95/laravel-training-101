<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        //
        'user_id' => $faker->randomElement(range(1,\App\User::count())),
    ];
});
