<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model\User;
use App\Model\Roles;
// use App\User;
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
        'ad_name' => $faker->name,
        'ad_phone' => '0355978258',
        'ad_email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        'ad_password' => '202cb962ac59075b964b07152d234b70', // password
        // 'remember_token' => Str::random(10),
    ];
});
$factory->afterCreating(User::class,function($admin,$faker){
    $role=Roles::where('rol_name','user')->get();
    $admin->roles()->sync($role->pluck('rol_id')->toArray());
});