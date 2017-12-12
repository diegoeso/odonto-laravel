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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tratamiento::class, function (Faker $faker)use ($factory) {
    return [
        'nombre' => $faker->name,
        'costo' => $faker->randomDigit,
        'tiempo' => $faker->randomDigit,
        'id_odontologo' => $factory->create(App\User::class)->id,
    ];
});

$factory->define(App\Pasiente::class, function (Faker $faker) use ($factory) {

    return [
        'nombre' => $faker->name,
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'malestares'	   => $faker->word,
        'id_odontologo' => $factory->create(App\User::class)->id,
        'id_tratamiento' => $factory->create(App\Tratamiento::class)->id,
        // 'id_odontologo'	   =>  function() { return factory(App\User::class)->id },
        // 'id_tratamiento'   =>  function() { return factory(App\Tratamiento::class)->id },
    ];
});

$factory->define(App\Agenda::class, function (Faker $faker) use($factory){
    return [
        'id_pasiente' => $factory->create(App\Pasiente::class)->id,
        'fecha' 	  => $faker->date($format = 'Y-m-d', $max = 'now'),
        'hora'        => $faker->time($format = 'H:i:s', $max = 'now'),
        'id_odontologo' => $factory->create(App\User::class)->id,
    ];
});


$factory->define(App\Diccionario::class, function (Faker $faker){
    return [
        'malestar' => $faker->sentence(2),
        'medicamento' 	  => $faker->text(80),
    ];
});