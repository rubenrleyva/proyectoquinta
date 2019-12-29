<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'apellidos' => $faker->lastName,
        'domicilio' => $faker->streetAddress,
        'fechanacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'dni' => $faker->dni,
        'telefono' => $faker->phoneNumber,
        'localidad' => $faker->city,
        'codigopostal' => $faker->postcode,
        'matricula' => Str::random(5),
        'clasespracticas' => 0,
        'tipousuario' => 2,
        'teorico' => 2,
        'practico' => 2,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'comentario' => Str::random(10),
        'id_foto' => 1,
    ];
});
