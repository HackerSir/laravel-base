<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $dataTime = $faker->dateTime;
    $ip = ($faker->boolean) ? $faker->ipv4 : $faker->ipv6;
    $isConfirmed = $faker->boolean(80);

    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'confirm_code'   => (!$isConfirmed) ? str_random(60) : '',
        'confirm_at'     => ($isConfirmed) ? $dataTime : null,
        'register_at'    => $dataTime,
        'register_ip'    => $ip,
        'last_login_at'  => $dataTime,
        'last_login_ip'  => $ip,
    ];
});
